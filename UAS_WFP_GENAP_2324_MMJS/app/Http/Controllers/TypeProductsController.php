<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\Auth;

class TypeProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TypeProduct::all();

        return view('tipeproduk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipeproduk.create');
    }

    public function store(Request $request)
    {
        $namaTipe = $request->type_name;

        $data = new TypeProduct();
        $data->nama = $namaTipe;
        $data->save();

        return redirect()->route('tipeproduk.index')->with('status','Horray ! Your data is successfully recorded !');
    }

    public function show(string $id)
    {
        
    }

    public function edit(TypeProduct $tipeproduk)
    {
        $data = $tipeproduk;
        return view('tipeproduk.edit', compact('data'));
    }

    public function update(Request $request, TypeProduct $tipeproduk)
    {
        $updatedData = $tipeproduk;
        $updatedData->nama = $request->type_name;
        $updatedData->update();

        return redirect()->route('tipeproduk.index')->with('status','Horray ! Your data is successfully updated !');
    }

    public function destroy(string $id)
    {
        try
        {
            $data = TypeProduct::find($id);
            $data->delete();
            return redirect('tipeproduk')->with('status','successfully deleted', 'Your has been deleted');
        } catch (\Throwable $th ){ 
            $msg = "Delete error, this hotel has products and transactions data";
            return redirect()->route('hotel.index')->with('status',$msg);
        }


    }
}
