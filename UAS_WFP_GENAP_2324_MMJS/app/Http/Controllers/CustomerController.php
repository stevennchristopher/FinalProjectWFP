<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::all();

        return view('customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaCust = $request->customer_name;
        $addrCust = $request->customer_address;

        $data = new Customer();
        $data->name = $namaCust;
        $data->address = $addrCust;
        $data->save();

        return redirect()->route('customer.index')->with('status','Horray ! Your data is successfully recorded !');
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
    public function edit(Customer $customer)
    {
        $data = $customer;
        return view('customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $updatedData = $customer;
        $updatedData->name = $request->customer_name;
        $updatedData->address = $request->customer_address;
        $updatedData->update();
        return redirect()->route('customer.index')->with('status','Horray ! Your data is successfully updated !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $deletedData = $customer;
            $deletedData->delete();

            return redirect()->route('customer.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('customer.index')->with('error', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Customer::find($id);
        return response()->json(array(
        'status' => 'oke',
        'msg' => view('customer.getEditForm', compact('data'))->render()
        ),200);
    }

    public function deleteData(Request $request)
    {
        try{
            $id = $request->id;
            $data = Customer::find($id);
            $data->delete();
            return response()->json(array(
            'status' => 'oke',
            'msg' => 'customer data is removed !'
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
