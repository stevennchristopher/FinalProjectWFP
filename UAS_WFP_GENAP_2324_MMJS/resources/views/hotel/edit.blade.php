@extends('layouts.conquer2')


@section('content')
<form method="POST" action="{{ route('hotel.update', $data->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Hotel Name" value="{{ $data->name }}" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Enter your Hotel Address" value="{{ $data->address }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your Hotel Phone" value="{{ $data->phone }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Hotel Email" value="{{ $data->email }}" required>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" name="rating" class="form-control" id="rating" placeholder="Enter your Hotel Rating" value="{{ $data->rating }}">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control" id="type">
            @foreach ($types as $t)
                <option @if($data->type_id == $t->id) selected @endif value="{{ $t->id }}">{{ $t->name }}</option>
            @endforeach
        </select>
    </div>

    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
