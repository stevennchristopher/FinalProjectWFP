<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Membership;
use App\Models\Customer;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Membership::all();
        return view('membership.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('membership.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaMemb = $request->customer;
        $pointMemb = $request->point;

        $data = new Membership();
        $data->customer_id = $namaMemb;
        $data->point = $pointMemb;
        $data->save();

        return redirect()->route('membership.index')->with('status','Horray ! Your data is successfully recorded !');
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
    public function edit(Membership $membership)
    {
        $data = $membership;
        $dataCustomer = Customer::all();
        return view('membership.edit', compact('data', 'dataCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membership $membership)
    {
        $updatedData = $membership;
        $updatedData->customer_id = $request->membership_customer;
        $updatedData->point = $request->membership_point;
        $updatedData->update();
        return redirect()->route('membership.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membership $membership)
    {
        try {
            $deletedData = $membership;
            $deletedData->delete();

            return redirect()->route('membership.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('membership.index')->with('error', $msg);
        }
    }

    
}
