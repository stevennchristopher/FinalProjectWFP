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
                                                <h4 class="card-title"><b> Transaction #{{$data->transaction_date}}</b></h4>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Type</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                
                                                @foreach ($details[$data->id] as $p)
                                                <p class="card-text m-3"><b>Product Name: </b>{{$p->name}}</p>
                                                <p class="card-text m-3"><b>Product Hotel: </b>{{$p->hotels->name}}</p>
                                                <p class="card-text m-3"><b>Product Price: </b>{{'IDR '.number_format($p->price, 0, ',')}}</p>
                                                <p class="card-text m-3"><b>Product Type: </b>{{$p->tipeproduks->nama}}</p>
                                                <p class="card-text m-3"><b>Quantity: </b>{{$p->pivot->quantity}}</p>
                                                <p class="card-text m-3"><b>Subtotal: </b>{{'IDR '.number_format($p->pivot->subtotal, 0, ',')}}</p>
                                                @endforeach
                                                <p class="card-text m-3"><b>Transaction Date: </b>{{$data->transaction_date}}</p>
                                                <p class="card-text m-3"><b>Total: </b>{{'IDR '.number_format($data->harga_asli, 0, ',')}}</p>
                                                <p class="card-text m-3"><b>Discount: </b>{{'-IDR '.number_format($data->diskon, 0, ',')}}</p>
                                                <p class="card-text m-3"><b>Tax (11%): </b>{{'IDR '.number_format($data->ppn, 0, ',')}}</p>
                                                <h5 class="card-text m-3"><b>Grand Total: {{'IDR '.number_format($data->harga_grandtotal, 0, ',')}}</b></h5>
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
