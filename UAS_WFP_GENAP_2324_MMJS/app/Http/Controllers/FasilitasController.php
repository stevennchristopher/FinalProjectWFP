<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::all();

        return view('fasilitas.index', compact('data'));
    }

    public function create()
    {
        return view('fasilitas.create');
    }


    public function store(Request $request)
    {
        $namaFas = $request->fasilitas_name;
        $Desc = $request->fasilitas_description;

        $data = new Fasilitas();
        $data->name = $namaFas;
        $data->description = $Desc;
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
