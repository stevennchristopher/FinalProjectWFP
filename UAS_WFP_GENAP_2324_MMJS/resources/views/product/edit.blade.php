@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Update Hotel Product</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Update Product</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('product.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Product</label>
        <input type="text" class="form-control" name="product_nane" placeholder="Enter type" value="{{$data->type}}">
        <small class="form-text text-muted">Please write down the new type of product here.</small>

        <br><br>

        <label>Price of Product</label>
        <input type="number" class="form-control" name="product_price" placeholder="Enter price" value="{{$data->price}}">
        <small class="form-text text-muted">Please write down the new price of product here.</small>

        <br><br>

        <label>Image of Product</label>
        <input type="text" class="form-control" name="product_image" placeholder="Enter image" value="{{$data->image}}">
        <small class="form-text text-muted">Please write down the new image of product here.</small>

        <br><br>

        <label>Hotel of Product</label><br>
        <select name="product_hotel">
            @foreach ($dataHotel as $d)
                @if ($data->hotel_id == $d->id)
                    <option value="{{$d->id}}" selected>{{$d->name}}</option>
                @else
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endif
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the new hotel of product here.</small>

        <br><br>

        <label>Avaialble Room of Product</label>
        <input type="number" class="form-control" name="product_roomNum" placeholder="Enter Number of Room" value="{{$data->available_room}}">
        <small class="form-text text-muted">Please write down the new number room of product here.</small>

        <label>Type of Product</label><br>
        <select name="product_type">
            @foreach ($types as $t)
                @if ($t->tipeproduk_id == $t->id)
                    <option value="{{$t->id}}" selected>{{$t->nama}}</option>
                @else
                    <option value="{{$t->id}}">{{$t->nama}}</option>
                @endif
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the new hotel of product here.</small>

        <br><br>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
