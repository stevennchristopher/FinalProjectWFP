<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Type::all();
        return view('type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //cara 1 menggunakan $request get
        //$namaTipe = $request->get('type_name');

        // $data = new Type();
        // $data->name = $request->get('type_name');
        // $data->save();

        //cara 2 menggunakan $request name of object
        $namaTipe = $request->type_name;
        $descTipe = $request->type_desc;

        $data = new Type();
        $data->name = $namaTipe;
        $data->description = $descTipe;
        $data->save();

        return redirect()->route('type.index')->with('status','Horray! Your data is successfully deleted !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $data = $type;
        return view('type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $updatedData = $type;
        $updatedData->name = $request->type_name;
        $updatedData->description = $request->type_desc;
        $updatedData->update();

        return redirect()->route('type.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $user=Auth::user();
        $this->authorize('delete-permission',$user);

        try {
            $deletedData = $type;
            $deletedData->delete();

            return redirect()->route('type.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('type.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Type::find($id);
        return response()->json(array(
        'status' => 'oke',
        'msg' => view('type.getEditForm', compact('data'))->render()
        ),200);
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Type::find($id);
        return response()->json(array(
        'status' => 'oke',
        'msg' => view('type.getEditFormB', compact('data'))->render()
        ),200);
    }

    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = Type::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is up-to-date !'
        ),200);
    }

    public function deleteData(Request $request)
    {
        try{
            $id = $request->id;
            $data = Type::find($id);
            $data->delete();
            return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
            ),200);
        }
        catch(\PDOException $ex){
            return response()->json(array(
            'status' => 'error',
            'msg' => 'Failed to delete data ! Make sure there is no related data before deleting it'
            ),200);
        }
    }
}
