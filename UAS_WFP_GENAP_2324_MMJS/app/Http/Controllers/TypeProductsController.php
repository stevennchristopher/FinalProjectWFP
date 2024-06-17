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
          
    }

    public function show(string $id)
    {
        
    }

    public function edit(TypeProduct $type)
    {
        
    }

    public function update(Request $request, TypeProduct $type)
    {
        
    }

    public function destroy(TypeProduct $typeproducts)
    {
        $user=Auth::user();
        $this->authorize('delete-permission',$user);

        try {
            $deletedData = $typeproducts;
            $deletedData->delete();

            return redirect()->route('tipeproduk.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('tipeproduk.index')->with('error', $msg);
        }
    }
}
