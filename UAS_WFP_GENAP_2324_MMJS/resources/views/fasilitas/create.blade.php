@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Fasilitas</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Fasilitas</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('fasilitas.store') }}">
    @csrf
    <div class="form-group">
        <label>Name of Fasilitas</label>
        <input type="text" class="form-control" id="input_name" name="fasilitas_name" placeholder="Enter name">
        <small class="form-text text-muted">Please write down the new name of fasilitas here.</small>

        <br><br>

        <label>Description of Fasilitas</label>
        <input type="text" class="form-control" id="input_description" name="fasilitas_description" placeholder="Enter description">
        <small class="form-text text-muted">Please write down the new description of fasilitas here.</small>

        <br><br>

        <label>Product of Facility</label><br>
        <select name="product_fasilitas"  class="form-control">
            @foreach ($dataProduct as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the hotel of product here.</small>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
