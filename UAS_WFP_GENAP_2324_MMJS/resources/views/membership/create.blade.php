@extends('layouts.conquer2')

@section('title')
Add New Membership
@endsection

@section('content')
<h3 class="page-title">Form Create Membership</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Membership</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>

<form method="POST" action="{{route('membership.store')}}">
@csrf
    <div class="form-group">
    <label for="customer">Name of Customer</label>
        <select name="customer" class="form-control" id="customer">
            @foreach ($customers as $d)
            <option value="{{$d->id}}"> {{$d->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="point">Point</label>
        <input type="number" name="point" class="form-control" id="point"  placeholder="Enter your Point">
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
