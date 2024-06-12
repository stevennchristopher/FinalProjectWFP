@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:antiquewhite">

@section('content')
<center><h1 class="display-1">Pilihan hotel:</h1></center>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Hotel</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>

<div class="container text-center">
    <div class="row">
        @foreach ($data as $d)
          <div class="col" style="margin-bottom: 50px">
            <div class="card mx-auto" style="width: 18rem">
            <img style="height: 190px" src="{{ asset('images/hotel/'.$d->image) }}" class="card-img-top">
            <a href="{{ url('hotel/uploadPhoto/'.$d->id) }}">
            <button class='btn btn-xs btn-default'>upload photo</button></a>

                <div class="card-body">
                    <h5 class="card-title">{{$d->name}}</h5>

                    <img height='100px' src="{{ asset('/logo/'.$d->id.'.jpg')}}"/>
                    <a href="{{ url('hotel/uploadLogo/'.$d->id) }}">
                    <button class='btn btn-xs btn-default'>upload logo</button></a>
                    <br><br>

                    <p class="card-text">Address: {{$d->address}}</p>
                    <p class="card-text">Postcode: {{$d->postcode}}</p>
                    <p class="card-text">City: {{$d->city}}</p>
                    <p class="card-text">State: {{$d->state}}</p>
                    <p class="card-text">Country: {{$d->country}}</p>
                    <p class="card-text">Phone: {{$d->phone}}</p>
                    <p class="card-text">Fax: {{$d->fax}}</p>
                    <p class="card-text">Email: {{$d->email}}</p>
                    <p class="card-text">Type: {{$d->accommodation_type}}</p>
                    <p class="card-text">Web: {{$d->web}}</p>
                    <p class="card-text">Type of Hotel: {{$d->name}}</p>

                    <p class="card-text">Product:
                        @foreach ($d->products as $item)
                            {{$item->type}},
                        @endforeach
                        <br>
                        <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'onclick='showProducts({{ $d->id }})'>Detail</a>
                    </p>

                    <a class="btn btn-info"  href="#detail_{{$d->id}}" data-toggle="modal">{{ $d->name }}</a>

                    <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$d->name}}</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('images/hotel/'.$d->image) }}.jpg" height='200px'/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="showproducts">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>
@endsection

@section('javascript')
    <script>
        function showProducts(hotel_id)
        {
            $.ajax({
                type:'POST',
                url:'{{route("hotel.showProducts")}}',
                data:{'_token':'<?php echo csrf_token() ?>',
                    'hotel_id':hotel_id
                    },
                success: function(data){
                    $('#showproducts').html(data.msg)
                }
            });
        }
    </script>
@endsection

</body>
</html>
