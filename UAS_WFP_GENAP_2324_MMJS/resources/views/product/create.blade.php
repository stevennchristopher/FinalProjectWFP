@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Hotel Product</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Product</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div class="form-group">
        <label>Name of Product</label>
        <input type="text" class="form-control" name="product_name" placeholder="Enter type">
        <small class="form-text text-muted">Please write down the type of product here.</small>

        <br><br>

        <label>Price of Product</label>
        <input type="number" class="form-control" name="product_price" placeholder="Enter price">
        <small class="form-text text-muted">Please write down the price of product here.</small>
        <br><br>

        <label>Hotel of Product</label><br>
        <select name="product_hotel"  class="form-control">
            @foreach ($dataHotel as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">Please choose the hotel of product here.</small>

        <br><br>

        <label>Available Room of Product</label>
        <input type="number" class="form-control" name="product_roomNum" placeholder="Enter Number of Room">
        <small class="form-text text-muted">Please write down the number room of product here.</small>
    </div>
    <div class="form-group">
    <label for="type">Type</label>
    <select name="product_type" class="form-control" id="product_type">
        @foreach ($types as $t)
        <option value="{{$t->id}}"> {{$t->nama}}</option>
        @endforeach
</select>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- <a href="{{ route('type.index') }}" class="btn btn-danger"><- Back</a> --}}
</form>
@endsection
