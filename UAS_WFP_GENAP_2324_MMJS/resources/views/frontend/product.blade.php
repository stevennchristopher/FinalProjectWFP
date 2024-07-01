@extends('layouts.frontend')

@section('content')
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="font-size:30px">Pilihan Product dari Hotel: </h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                    @foreach ($product as $p)
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('laralux.show',$p->id)}}">{{$p->name}}</a>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    @if($p->filenames)
                                        @foreach ($p->filenames as $filename)
                                            <img style="height: 190px" src="{{asset('images/prod/'.$p->id.'/'.$filename)}}" class="card-img-top"/><br>
                                        @endforeach
                                    @else
                                        <img src="{{asset('images/blank.jpg')}}">
                                    @endif
                                </a>
                                <div class="product-action">
                                    <a href="{{route('addCart',$p->id)}}"><i class="fa fa-cart-plus"></i></a>
                                    <a href="{{route('laralux.show',$p->id)}}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>IDR</span>{{$p->price}}</h3>
                                <a class="btn" href="{{route('addCart',$p->id)}}"><i class="fa fa-shopping-cart"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
