@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Hotel Customer</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Customer</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('customer.store') }}">
    @csrf
    <div class="form-group">
        <label>Name of Customer</label>
        <input type="text" class="form-control" id="input_name" name="customer_name" placeholder="Enter name">
        <small class="form-text text-muted">Please write down the name of customer here.</small>

        <br><br>

        <label>Address of Customer</label>
        <input type="text" class="form-control" id="input_address" name="customer_address" placeholder="Enter address">
        <small class="form-text text-muted">Please write down the address of customer here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
@endsection
