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
                                @foreach ($queryModel as $data)
                                <div class="col" style="margin-bottom: 50px">
                                    <div class="card mx-auto" style="width: 20rem">
                                        <div id="tr_{{$data->id}}" class="card-body">
                                            <center>
                                                <h4 class="card-title"><b>{{$data->name}}</b></h4>
                                            </center>
                                            <br>
                                            <p class="card-text m-3"><b>Price: </b>${{$data->price}}</p>
                                            <p class="card-text m-3"><b>Available: </b>{{$data->available_room}} rooms</p>
                                            <p class="card-text m-3"><b>Hotel Name: </b>{{$data->hotels->name}}</p>
                                            <p class="card-text m-3"><b>Type of Products: </b>{{$data->tipeproduks->nama}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
