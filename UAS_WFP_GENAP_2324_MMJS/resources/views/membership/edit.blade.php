@extends('layouts.conquer2')

@section('title')
Edit Membership
@endsection

@section('content')
<h3 class="page-title">Form Edit Membership</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Edit Membership</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>

<form method="POST" action="{{ route('membership.update', $data->id) }}">
@method("PUT")
@csrf
    <div class="form-group">
    <label for="name">Name of Customer</label>
        <select name="membership_customer" class="form-control" id="customer">
            @foreach ($dataCustomer as $d)
                @if ($data->id == $d->id)
                    <option value="{{$d->id}}" selected>{{$d->name}}</option>
                @else
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endif
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="point">Point</label>
        <input type="number" name="membership_point" class="form-control" id="point"  placeholder="Enter your Point" value="{{$data->point}}">
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
