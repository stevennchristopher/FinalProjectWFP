@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Update Fasilitas Hotel</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Update Fasilitas</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('fasilitas.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Fasilitas</label>
        <input type="text" class="form-control" id="input_name" name="fasilitas_name" placeholder="Enter name" value="{{$data->name}}">
        <small class="form-text text-muted">Please write down the new name of fasilitas here.</small>

        <br><br>

        <label>Description of Fasilitas</label>
        <input type="text" class="form-control" id="input_description" name="fasilitas_description" placeholder="Enter description" value="{{$data->description}}">
        <small class="form-text text-muted">Please write down the new description of fasilitas here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
@endsection
