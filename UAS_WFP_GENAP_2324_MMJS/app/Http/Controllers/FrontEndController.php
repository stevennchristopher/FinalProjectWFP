<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;

class FrontEndController extends Controller
{
    public function index(){
        $product = Product::all();

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

        return view('frontend.index', compact('product'));
    }

    public function show($id){
        $product = Product::find($id);

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

        return view('frontend.product-detail', compact('product'));
    }

    public function cart()
    {
        return view('frontend.cart');
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
            'name' => $product->type,
            'quantity' => 1,
            'price' => $product->price,
            'photo[]' => $filenames,
            ];
        }
        else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);

        return redirect()->back()->with("status","Produk Telah ditambahkan ke Cart");
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

            if($jumlahPesan < $product->available_room)
            {
                $cart[$id]['quantity']++;
            }
            else{
                return redirect()->back()->with('error', 'Jumlah pemesanan melebihi total kamar yang tersedia');
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

        return redirect()->back()->with("status", "Produk Telah dibuang dari Cart");
    }

    public function checkout()
    {
        $cart = session('cart');
        $user = Auth::user();

        $t = new Transaction();
        $t->user_id = $user->id;
        $t->customer_id = 1; //need to fix later
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        //insert into junction table product_transaction using eloquent
        $t->insertProducts($cart,$user);
        
        session()->forget('cart');
        return redirect()->route('laralux.index')->with('status','Checkout berhasil');

    }
}
