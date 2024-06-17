<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Hotel;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // untuk query raw
        // $queryRaw = DB::select("select * from products");

        //untuk query builder
        //$queryBuilder = DB::table('products as p')
                       // ->get();

        //untuk query model
        // $queryModel = Product::all();
        $dataHotel = Hotel::all();

        //dd($queryModel);

        //--------------------------------------------------------------------------------

        //passing data cara 1
        // return view('product.index', compact('queryModel', 'dataHotel'));

        //passing data cara 2
        // return view('product.index', ['data'=>$queryBuilder]);

        //---------------------------------------------------------------------------

        $queryModel=Product::all();
        foreach($queryModel as $r)
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
        return view('product.index', compact('queryModel', 'dataHotel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataHotel = Hotel::all();
        return view('product.create', compact('dataHotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $typeProduct = $request->product_name;
        $priceProduct = $request->product_price;
        $imgProduct = $request->product_image;
        $hotelProduct = $request->product_hotel;
        $roomnumProduct = $request->product_roomNum;

        $data = new Product();
        $data->type = $typeProduct;
        $data->price = $priceProduct;
        $data->image = $imgProduct;
        $data->hotel_id = $hotelProduct;
        $data->available_room = $roomnumProduct;
        $data->save();

        return redirect()->route('product.index')->with('status','Horray ! Your data is successfully recorded !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);

        //dd($data);

        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = $product;
        $dataHotel = Hotel::all();

        return view('product.edit', compact('data', 'dataHotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $updatedData = $product;
        $updatedData->type = $request->product_name;
        $updatedData->price = $request->product_price;
        $updatedData->image = $request->product_image;
        $updatedData->hotel_id = $request->product_hotel;
        $updatedData->available_room = $request->product_roomNum;
        $updatedData->update();
        return redirect()->route('product.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $deletedData = $product;
            $deletedData->delete();

            return redirect()->route('product.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('product.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Product::find($id);
        $dataHotel = Hotel::all();
        return response()->json(array(
        'status' => 'oke',
        'msg' => view('product.getEditForm', compact('data','dataHotel'))->render()
        ),200);
    }

    public function deleteData(Request $request)
    {
        try{
            $id = $request->id;
            $data = Product::find($id);
            $data->delete();
            return response()->json(array(
            'status' => 'oke',
            'msg' => 'product data is removed !'
            ),200);
        }
        catch(\PDOException $ex){
            return response()->json(array(
            'status' => 'error',
            'msg' => 'Failed to delete data ! Make sure there is no related data before deleting it'
            ),200);
        }
    }

    public function uploadPhoto(Request $request)
    {
        $product_id=$request->product_id;
        $product=Product::find($product_id);
        return view('product.formUploadPhoto', compact('product'));
    }

    public function simpanPhoto(Request $request)
    {
        $file=$request->file("file_photo");
        $folder='images/prod/'.$request->product_id;
        @File::makeDirectory(public_path()."/".$folder);
        $filename=time()."_".$file->getClientOriginalName();
        $file->move($folder,$filename);
        return redirect()->route('product.index')->with('status','photo terupload');
    }

    public function delPhoto(Request $request)
    {
        File::delete(public_path()."/".$request->filepath);
        return redirect()->route('product.index')->with('status','photo dihapus');
    }

}
