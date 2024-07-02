<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryModel = Transaction::all();

        //untuk yang di modal
        $dataCustomer = Customer::all();
        $dataProduct = Product::all();

        return view('transaction.index', ['data'=>$queryModel, 'dataCustomer'=>$dataCustomer, 'dataProduct'=>$dataProduct]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataCustomer = Customer::all();
        $dataProduct = Product::all();

        return view('transaction.create', compact('dataCustomer', 'dataProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $custTransaksi = $request->transaction_customer;

        $product_ids = $request->transaction_product;
        $quantities = $request->transaction_product_quantity;

        $data = new Transaction();
        $data->customer_id = $custTransaksi;
        $data->transaction_date = now();
        $data->harga_asli = $request->harga_asli;
        $data->diskon = $request->diskon;
        $data->ppn = $request->ppn;
        $data->harga_grandtotal = $request->harga_grandtotal;
        $data->save();

        $dataproducts = [];
        for ($i = 0; $i < count($product_ids); $i++) {
            $product = Product::find($product_ids[$i]);
            $prices =  $product->price;

            $dataproducts[$product_ids[$i]] = [
                'quantity' => $quantities[$i],
                'subtotal' => $quantities[$i] * $prices
            ];
        }

        $data->products()->attach($dataproducts);

        return redirect()->route('transaction.index')->with('status','Horray ! Your data is successfully recorded !');
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
    public function edit(Transaction $transaction)
    {
        $data = $transaction;
        $dataCustomer = Customer::all();

        return view('transaction.edit', compact('data', 'dataCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $updatedData = $transaction;
        $updatedData->customer_id = $request->transaction_customer;
        $updatedData->transaction_date = $request->transaction_date;
        $updatedData->transaction_date = $request->harga_asli;
        $updatedData->transaction_date = $request->diskon;
        $updatedData->transaction_date = $request->ppn;
        $updatedData->transaction_date = $request->harga_grandtotal;
        $updatedData->update();

        return redirect()->route('transaction.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        try {
            $deletedData = $transaction;
            $deletedData->delete();

            return redirect()->route('transaction.index')->with('status','Your data is sucessfully deleted !');
        }
        catch(\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('transaction.index')->with('error', $msg);
        }
    }

    public function showAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->products;
        return response()->json(array(
            'msg' => view('transaction.showModal', compact('data','products'))->render()
        ), 200);
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);
        $dataCustomer = Customer::all();
        return response()->json(array(
        'status' => 'oke',
        'msg' => view('transaction.getEditForm', compact('data','dataCustomer'))->render()
        ),200);
    }

    public function deleteData(Request $request)
    {
        try{
            $id = $request->id;
            $data = Transaction::find($id);
            $data->delete();
            return response()->json(array(
            'status' => 'oke',
            'msg' => 'transaction data is removed !'
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
