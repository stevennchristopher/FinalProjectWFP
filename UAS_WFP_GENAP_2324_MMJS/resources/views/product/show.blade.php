@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:antiquewhite">
<br>

@section('content')
<center><h1 class="display-1">Detail product:</h1></center>
<br>
<div class="container text-center">
    <div class="row">
          <div class="col" style="margin-bottom: 50px">
            <div class="card mx-auto" style="width: 18rem">
            {{-- <img style="height: 190px" src="{{ asset('images/product/'.$data->image) }}.jpg" class="card-img-top"> --}}
            <div class="card-body">
                <center><h3 class="card-title"><b>{{$data->name}}</b></h5></center><br>
                    <p class="card-text m-3"><b>Price: </b>${{$data->price}}</p>
                    <p class="card-text m-3"><b>Available: </b>{{$data->available_room}} rooms</p>
                    <p class="card-text m-3"><b>Hotel Name: </b>{{$data->hotels->name}}</p>
                    <p class="card-text m-3"><b>Type of Products: </b>{{$data->tipeproduks->nama}}</p>
            </div>

            @if($data->filenames)
                @foreach ($data->filenames as $filename)
                    <img style="height: 190px" src="{{asset('images/prod/'.$data->id.'/'.$filename)}}" class="card-img-top"/>
                    <br>
                @endforeach
            @endif
            <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
