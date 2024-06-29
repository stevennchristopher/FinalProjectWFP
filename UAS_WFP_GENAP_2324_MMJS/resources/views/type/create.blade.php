@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Hotel Types</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Type</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('type.store') }}">
    @csrf
    <div class="form-group">
        <label>Name of Type</label>
        <input type="text" class="form-control" id="input_name" name="type_name" placeholder="Enter name">
        <small class="form-text text-muted">Please write down the name of type here.</small>

        <br><br>

        <label>Description of Type</label>
        <input type="text" class="form-control" id="input_desc" name="type_desc" placeholder="Enter desc">
        <small class="form-text text-muted">Please write down the desc of type here.</small>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- <a href="{{ route('type.index') }}" class="btn btn-danger"><- Back</a> --}}
</form>
@endsection
