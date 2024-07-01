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
                                    <div class="col" style="margin-bottom: 50px">
                                        <div class="card mx-auto" style="width: 20rem">
                                            <div id="tr_{{$data->id}}" class="card-body">
                                                <center>
                                                    <h4 class="card-title"><b> Transaction #{{$data->id}}</b></h4>
                                                </center>
                                                <br>
                                                <p class="card-text m-3"><b>Price: </b>${{$data->price}}</p>
                                                {{-- <p class="card-text m-3"><b>Hotel Name: </b>{{$data->hotels->name}}</p>
                                                <p class="card-text m-3"><b>Type of Products: </b>{{$data->tipeproduks->nama}}</p> --}}
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
