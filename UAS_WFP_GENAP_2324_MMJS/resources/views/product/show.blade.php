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
<center><h1 class="display-1">Pilihan product:</h1></center>
<br>
<div class="container text-center">
    <div class="row">
          <div class="col" style="margin-bottom: 50px">
            <div class="card mx-auto" style="width: 18rem">
            <img style="height: 190px" src="{{ asset('images/product/'.$data->image) }}.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$data->type}}</h5>
                    <p class="card-text">Price: ${{$data->price}}</p>
                    <p class="card-text">Hotel ID: {{$data->hotel_id}}</p>
                    <p class="card-text">Hotel Name: {{$data->hotels->name}}</p>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection

</body>
</html>
