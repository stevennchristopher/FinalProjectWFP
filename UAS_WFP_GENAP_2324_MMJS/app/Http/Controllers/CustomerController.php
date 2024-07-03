<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Membership;
use App\Models\Hotel;

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

    public function poinMembershipTerbanyak()
    {
        $data = Membership::join('customers as c', 'memberships.customer_id', '=', 'c.id')
        ->select('c.id', 'c.name as namamember', 'memberships.point as point')
        ->groupBy('c.id', 'c.name', 'memberships.point')
        ->orderByDesc('memberships.point')
        ->limit(1)
        ->get();

        //dd($data);

        return view('laporan.poinmembershipterbanyak', compact('data'));
    }

    public function hotelReservasiTerbanyak()
{
    $data = Hotel::select('hotels.id', 'hotels.name as namahotel', DB::raw('SUM(product_transaction.quantity) as jumlahreservasi'))
        ->join('products', 'hotels.id', '=', 'products.hotel_id')
        ->join('product_transaction', 'products.id', '=', 'product_transaction.product_id')
        ->groupBy('hotels.id', 'hotels.name')
        ->orderByDesc(DB::raw('SUM(product_transaction.quantity)'))
        ->limit(3)
        ->get();

    //dd($data);

    return view('laporan.hotelreservasiterbanyak', compact('data'));
}


public function pelangganPembelianTerbanyak()
{
    $data = Customer::join('transactions', 'customers.id', '=', 'transactions.customer_id')
            ->select('customers.id', 'customers.name as namapelanggan', DB::raw('COUNT(transactions.id) as jumlahpembelian'))
            ->groupBy('customers.id', 'customers.name')
            ->orderByDesc(DB::raw('COUNT(transactions.id)'))
            ->limit(1)
            ->get();

    //dd($data);

    return view('laporan.pelangganpembelianterbanyak', compact('data'));
}

}
