<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\Transaction;
use App\Models\Membership;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

use Illuminate\Support\Facades\File;

class FrontEndController extends Controller
{
    public function indexSebelumLogin(){
        $hotel = Hotel::all();
        $points_remaining = 0;
        return view('frontend.index', compact('hotel'));
    }

    public function index(){
        $hotel = Hotel::all();

        $user = Auth::user();
        $user_id = $user->id;
        $points_remaining = Membership::where('customer_id', $user_id)->value('point');

        return view('frontend.index', compact('hotel', 'points_remaining'));
    }

    public function product($id){
        $product = Product::where('hotel_id', $id)->get();

        foreach($product as $r)
        {
            $directory = public_path('images/prod/'.$r->id);
            if(File::exists($directory))
            {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $r['filenames']=$filenames;
            }
        }

        return view('frontend.product', compact('product'));
    }

    public function show($id){
        $product = Product::find($id);
        $fasilitas = Fasilitas::where('product_id', $id)->get();

        $directory = public_path('images/prod/'.$id);
        if(File::exists($directory))
        {
            $files = File::files($directory);
            $filenames = [];
            foreach ($files as $file) {
                $filenames[] = $file->getFilename();
            }
            $product['filenames']=$filenames;
        }

        return view('frontend.product-detail', compact('product','fasilitas'));
    }

    public function cart()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $points_remaining = Membership::where('customer_id', $user_id)->value('point');
        return view('frontend.cart', compact('points_remaining'));
    }


    public function addToCart($id)
    {
        $product = Product::find($id);

        $directory = public_path('images/prod/'.$id);
        if(File::exists($directory))
        {
            $files = File::files($directory);
            $filenames = [];
            foreach ($files as $file) {
                $filenames[] = $file->getFilename();
            }
        }

        $cart = session()->get('cart');

        if(!isset($cart[$id]))
        {
            $cart[$id] = [
            'id' => $id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'photo[]' => $filenames,
            'hotel' => $product->hotels->name
            ];
        }
        else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);

        return redirect()->back()->with("status","Produk berhasil ditambahkan ke Cart");
    }

    public function addQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        $product = Product::find($cart[$id]['id']);

        if(isset($cart[$id]))
        {
            $jumlahAwal = $cart[$id]['quantity'];
            $jumlahPesan = $jumlahAwal+1;

            if($jumlahPesan <= $product->available_room)
            {
                $cart[$id]['quantity']++;
            }
            else if ($jumlahPesan > $product->available_room)
            {
                return redirect()->back()->with("error","Jumlah pemesanan melebihi total kamar yang tersedia");
            }
        }

        session()->forget('cart');
        session()->put('cart', $cart);
    }

    public function reduceQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        if(isset($cart[$id]))
        {
            if($cart[$id]['quantity'] > 0)
            {
                $cart[$id]['quantity']--;

                if($cart[$id]['quantity'] === 0)
                {
                    unset($cart[$id]);
                }
            }
        }

        session()->forget('cart');
        session()->put('cart', $cart);
    }

    public function deleteFromCart($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
        }

        session()->forget('cart');
        session()->put('cart',$cart);

        return redirect()->back()->with("status", "Produk berhasil dibuang dari Cart");
    }

    public function checkout(Request $request)
    {
        $cart = session('cart');

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart kosong. Tambahkan produk ke Cart terlebih dahulu untuk checkout.');
        }

        $customer = Auth::user();
        $requestData = $request->all();


        //checokout ini kan ngambil id customer, nah tp authnya kan punyanya user, harus dicari tau untuk ngehubunginnya buat ndapetin id customer

        $t = new Transaction();
        $t->customer_id = $customer->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $diskon = isset($requestData['diskon']) ? intval($requestData['diskon']) : 0;
        $t->harga_asli = $requestData['hargaasli'];
        $t->diskon = $requestData['diskon'];
        $t->ppn = $requestData['ppn'];
        $t->harga_grandtotal = $requestData['hargaakhir'];
        $t->save();

        //insert into junction table product_transaction using eloquent
        $t->insertProducts($cart);
        $this->updatePoints($customer->id, $cart);

        $redeemedpoints = isset($requestData['points']) ? intval($requestData['points']) : 0;
        if ($redeemedpoints > 0) {
            $this->redeemPoints($redeemedpoints, $customer->id);
        }

        session()->forget('cart');
        return redirect()->route('laralux.index')->with('status','Checkout berhasil');
    }

    public function updatePoints($id, $cart)
    {
        $membership = Membership::find($id);
        if (!$membership) {
            throw new Exception("Membership tidak ditemukan. Silakan buat member terlebih dahulu.");
        }
        $addpoints = 0;
        $totalsisanya = 0;

        foreach ($cart as $item) {
            $product = null;
            $product = Product::find($item['id']);
            if (in_array($product['tipeproduk_id'], ['2', '5', '6'])) {
                $addpoints += 5 * $item['quantity'];
            } else {
                $totalsisanya += $item['quantity'] * $item['price'];
            }
        }
        $addpoints += floor($totalsisanya / 300000);

        $membership->point += $addpoints;
        $membership->save();

    }

    public function redeemPoints($redeemedpoints, $id)
    {
        $membership = Membership::find($id);

        $membership->point -= $redeemedpoints;
        $membership->save();
    }

    public function transaksi()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $transactions = Transaction::where('customer_id', $user_id)->with('products')->get();
        $details = [];
        foreach ($transactions as $transaction) {
            $details[$transaction->id] = $transaction->products;
        }

        return view('frontend.transaksi', compact('transactions', 'details'));
    }
}
