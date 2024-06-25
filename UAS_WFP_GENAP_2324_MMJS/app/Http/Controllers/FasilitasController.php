<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fasilitas;
use App\Models\Product;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::all();
        return view('fasilitas.index', compact('data'));
    }

    public function create()
    {
        $dataProduct = Product::all();
        return view('fasilitas.create', compact('dataProduct'));
    }

    public function store(Request $request)
    {
        $namaFas = $request->fasilitas_name;
        $Desc = $request->fasilitas_description;
        $prodId = $request->product_fasilitas;

        $data = new Fasilitas();
        $data->name = $namaFas;
        $data->description = $Desc;
        $data->product_id = $prodId;

        $data->save();

        return redirect()->route('fasilitas.index')->with('status','Horray ! Your data is successfully recorded !');
    }

    public function show(string $id)
    {

    }

    public function edit(Customer $customer)
    {
        $data = $fasilitas;
        return view('fasilitas.edit', compact('data'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $updatedData = $fasilitas;
        $updatedData->name = $request->fasilitas_name;
        $updatedData->description = $request->fasilitas_description;
        $updatedData->update();
        return redirect()->route('fasilitas.index')->with('status','Horray ! Your data is successfully updated !');

    }

    public function destroy(Fasilitas $fasilitas)
    {
        try {
            $deletedData = $fasilitas;
            $deletedData->delete();

            return redirect()->route('fasilitas.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('fasilitas.index')->with('error', $msg);
        }
    }
}
