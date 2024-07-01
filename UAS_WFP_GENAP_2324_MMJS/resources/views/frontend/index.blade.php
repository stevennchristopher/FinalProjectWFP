@extends('layouts.frontend')

@section('content')
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @guest
                <h2 style="font-size:30px">Pilihan Hotel: </h2>
                @else
                @isset($points_remaining)
                <h2 style="font-size:20px">Available Points: {{$points_remaining}}</h2>
                @endisset
                <h2 style="font-size:30px">Pilihan Hotel: </h2>
                @endguest
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                    @foreach ($hotel as $h)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('laralux.product', $h->id)}}">{{ $h->name}}</a><br><br>
                                <img style="height: 100px" src="{{asset('logo/'.$h->id.'.jpg')}}"/><br><br>
                                <div class="ratting">

                                    <h3 style="font-size:20px; color: white;">{{$h->rating}}  <i class="fa fa-star"></i></h3>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img style="height: 190px" src="{{asset('images/hotel/'.$h->id.'.jpg')}}" class="card-img-top"/><br>
                                </a>
                                <div class="product-action">
                                    <a href="{{route('laralux.product', $h->id)}}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3 style="font-size:15px">Hotel Type: <span>{{$h->types->name}}</span></h3><br>
                                <h3 style="font-size:15px">Address: <span>{{$h->address}}</span></h3><br>
                                <h3 style="font-size:15px">Phone: <span>{{$h->phone}}</span></h3><br>
                                <h3 style="font-size:15px">Email: <span>{{$h->email}}</span></h3><br>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
