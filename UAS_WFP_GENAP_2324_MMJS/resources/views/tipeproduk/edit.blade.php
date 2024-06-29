@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Edit Product Types</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Edit Type</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('tipeproduk.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Type</label>
        <input type="text" class="form-control" id="input_name" name="type_name" placeholder="Enter name" value="{{ $data->nama }}">
        <small class="form-text text-muted">Please write down the new name of type here.</small>

        <br>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
