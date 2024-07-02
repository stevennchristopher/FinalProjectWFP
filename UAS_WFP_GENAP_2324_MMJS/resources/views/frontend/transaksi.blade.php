@extends('layouts.frontend')

@section('content')
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                @if($transactions->isEmpty())
                                    <div class="col-12">
                                        <p class="text-center">You do not have any transaction yet.</p>
                                    </div>
                                @else
                                    @foreach ($transactions as $data)
                                    <div class="col-12 mb-4" style="margin-bottom: 50px">
                                        <div class="card mx-auto" style="max-width: 80rem;">
                                            <div id="tr_{{$data->id}}" class="card-body">
                                                <h3 class="card-title" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;"><b> TRANSACTION #{{$data->transaction_date}}</b></h3>
                                                @foreach ($details[$data->id] as $p)
                                                <h2 style="font-size: 25px">{{$p->hotels->name}} <small>({{$p->hotels->types->name}})</small></h2>
                                                
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Type</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$p->name}}</td>
                                                            <td>{{$p->tipeproduks->nama}}</td>
                                                            <td>{{$p->pivot->quantity}}</td>
                                                            <td>{{'IDR '.number_format($p->price, 0, ',')}}</td>
                                                            <td>{{'IDR '.number_format($p->pivot->subtotal, 0, ',')}}</td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                @endforeach
                                                <center><h3 style="border-top: 2px solid #000; padding-top: 10px; margin-top: 20px;"><b>PAYMENT DETAIL</b></h3></center>
                                                <p class="card-text m-3 d-flex justify-content-between">
                                                    <span><b>Total</b></span>
                                                    <span>{{'IDR '.number_format($data->harga_asli, 0, ',')}}</span>
                                                </p>
                                                <p class="card-text m-3 d-flex justify-content-between">
                                                    <span><b>Tax (11%)</b></span>
                                                    <span>{{'IDR '.number_format($data->ppn, 0, ',')}}</span>
                                                </p>
                                                <p class="card-text m-3 d-flex justify-content-between" style="color: #39ff14">
                                                    <span><b>Discount </b></span>
                                                    <span>{{'-IDR '.number_format($data->diskon, 0, ',')}}</span>
                                                </p>
                                                <h2 class="card-text m-3 d-flex justify-content-between">
                                                   <span><b>Grand Total</b></span>
                                                    <span><b>{{'IDR '.number_format($data->harga_grandtotal, 0, ',')}}</b></span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
