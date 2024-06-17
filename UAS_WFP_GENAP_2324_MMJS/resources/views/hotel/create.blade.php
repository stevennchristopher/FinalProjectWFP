@extends('layouts.conquer2')

@section('title')
Add new hotel

@endsection

@section('content')
<center><h1 class="display-1">Add New Hotel</h1></center>
<form method="POST" action="{{route('hotel.store')}}">
@csrf
    <div class="form-group">
    <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name"  placeholder="Enter your Hotel Name">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="address"  placeholder="Enter your Hotel Address">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone"  placeholder="Enter your Hotel Phone Number">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email"  placeholder="Enter your Hotel Email Address">
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="text" name="rating" class="form-control" id="rating"  placeholder="Enter your Hotel Rating Address">
    </div>
    <div class="form-group">
    <label for="name">Name</label>
    <select name="type" class="form-control" id="type">
        @foreach ($types as $t)
        <option value="{{$t->id}}"> {{$t->name}}</option>
        @endforeach
</select>
    </div>
    <a class="btn btn-info" href="{{url()->previous()}}">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection