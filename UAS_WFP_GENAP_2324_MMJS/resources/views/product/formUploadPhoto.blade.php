@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Upload Photo untuk Product {{$product->type}}</h3>
<div class="container">
    <form method="POST" enctype="multipart/form-data" action="{{url('product/simpanPhoto')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputType">Pilih Photo</label>
            <input type="file" class="form-control" name="file_photo"/>
            <input type="hidden" name='product_id' value="{{$product->id}}"/>
        </div>
        <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
