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
<center><h1 class="display-1">Pilihan Hotel:</h1></center>
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
@if(@session('error'))
    <div class="alert alert-danger ">{{ session('error') }}</div>
@endif

<a href="{{ route('hotel.create') }}" class="btn btn-success">+ New Hotel</a><br><br>
<div class="container">
    <div class="row">
        @foreach ($data as $d)
          <div class="col" style="margin-bottom: 50px">
            <div class="card mx-auto" style="width: 30rem">
            @if (file_exists(public_path('images/hotel/'.$d->id.'.jpg')))
                    <img style="height: 190px" src="{{ asset('images/hotel/'.$d->id.'.jpg') }}" class="card-img-top">
                @else
                    <a href="{{ url('hotel/uploadPhoto/'.$d->id) }}">
                        <button class='btn btn-info' style="width: 100%; height: 190px;">Upload Foto Hotel</button>
                    </a>
            @endif
                <div class="card-body">
                    <center><h3><b class="card-title">{{$d->name}}</b></h3></center>
                    <br>
                    <center><img height='100px' src="{{ asset('/logo/'.$d->id.'.jpg')}}"/></center>
                    <br>
                    <p class="card-text m-3"><b>Address: </b>{{$d->address}}</p>
                    <p class="card-text m-3"><b>Phone: </b>{{$d->phone}}</p>
                    <p class="card-text m-3"><b>Email: </b>{{$d->email}}</p>
                    <p class="card-text m-3"><b>Rating: </b>{{$d->rating}}</p>
                    <p class="card-text m-3"><b>Type of Hotel: </b>{{$d->types->name}}</p>

                    <p class="card-text m-3"><b>Product:</b>
                        {{-- @foreach ($d->products as $item)
                            {{$item->type}},
                        @endforeach --}}
                        {{-- <br> --}}
                        <a class='btn btn-xs btn-warning' data-toggle='modal' data-target='#myModal'onclick='showProducts({{ $d->id }})'>Detail</a>
                    </p>
                        <a class="m-3" href="{{ url('hotel/uploadLogo/'.$d->id) }}">
                            <button class='btn btn-info'>Upload Logo Hotel</button>
                        </a>

                    <a class="m-3 btn btn-warning" href="{{ route('hotel.edit', $d->id)}}">Edit Data</a>
                    <form method="POST" action="{{route('hotel.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger m-3" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
                    </form>

                    {{-- <a class="btn btn-info"  href="#detail_{{$d->id}}" data-toggle="modal">{{ $d->name }}</a> --}}

                    {{-- <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
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
                    </div> --}}
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
