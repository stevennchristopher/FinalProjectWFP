@extends('layouts.frontend')

@section('content')
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                                <div class="slider-nav-img">
                                    @if($product->filenames)
                                        @foreach ($product->filenames as $filename)
                                            <img style="height: 190px" src="{{asset('images/prod/'.$product->id.'/'.$filename)}}" class="card-img-top"/><br>
                                        @endforeach
                                    @else
                                        <img src="{{asset('images/blank.jpg')}}">
                                    @endif
                                </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2>{{$product->name}}</h2>
                                    <h5>By: {{$product->hotels->name}} Hotel</h5>
                                    <h5>Product Type: {{$product->tipeproduks->nama}}</h5>
                                </div>
                                <!-- <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>{{ 'IDR'.$product->price }}</p>
                                    <br><br>
                                    <h4>Fasilitas:</h4>
                                    @foreach ($fasilitas as $item)
                                    <br>
                                    <b>Nama: </b>{{$item->name}}
                                    <br>
                                    <b>Deskripsi: </b>{{$item->description}}
                                    <br>
                                    @endforeach
                                    {{-- <br> --}}
                                </div>
                                <div class="action">
                                    <a class="btn" href="{{route('addCart',$product->id)}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
