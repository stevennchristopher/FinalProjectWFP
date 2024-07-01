@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Fasilitas Hotel</h3>
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
        <small class="form-text text-muted">Please write down the name of fasilitas here.</small>

        <br><br>

        <label>Description of Fasilitas</label>
        <input type="text" class="form-control" id="input_address" name="fasilitas_description" placeholder="Enter description">
        <small class="form-text text-muted">Please write down the description of fasilitas here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
</form>
@endsection
