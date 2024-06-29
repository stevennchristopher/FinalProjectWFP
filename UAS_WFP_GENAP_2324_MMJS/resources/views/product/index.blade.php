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

@section('content')
<center><h1 class="display-1">Pilihan product:</h1></center>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Product</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>

<div class="content">
    @if(@session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if(@session('error'))
        <div class="alert alert-danger ">{{ session('error') }}</div>
    @endif

    <a href="{{ route('product.create') }}" class="btn btn-success">+ New Product</a>

    {{-- <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Product(with Modals)</a> --}}

    <div class="container">
        <br>
        <div class="row ">
            @foreach ($queryModel as $data)
              <div class="col" style="margin-bottom: 50px">
                <div class="card mx-auto" style="width: 30rem">
                <div id="tr_{{$data->id}}" class="card-body">
                        <center><h3 class="card-title"><b>{{$data->name}}</b></h5></center><br>
                        <p class="card-text m-3"><b>Price: </b>${{$data->price}}</p>
                        <p class="card-text m-3"><b>Available: </b>{{$data->available_room}} rooms</p>
                        <p class="card-text m-3"><b>Hotel Name: </b>{{$data->hotels->name}}</p>
                        <p class="card-text m-3"><b>Type of Products: </b>{{$data->tipeproduks->nama}}</p>
                        <!-- <p class="card-text"><a class="btn btn-warning" href="{{ route('product.edit', $data->id)}}">Edit</a></p> -->
                        <p class="card-text m-3"><a href="#modalEditA" class="btn btn-warning" data-toggle="modal" onclick="getEditForm({{$data->id}})">Edit</a></p>

                        <!-- <p class="card-text"><a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$data->id}} - {{$data->type}} ? ')) deleteDataRemoveTR({{$data->id}})">Delete without Reload</a></p> -->

                        <form method="POST" action="{{route('product.destroy', $data->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger m-3" onclick="return confirm('Are you sure to delete {{$data->id}} - {{$data->type}} ? ');">
                        </form>
                    </div>
                {{-- <img style="height: 190px" src="{{ asset('images/product/'.$data->image) }}.jpg" class="card-img-top"> --}}

                    @if($data->filenames)
                        @foreach ($data->filenames as $filename)
                            <img style="height: 190px" src="{{asset('images/prod/'.$data->id.'/'.$filename)}}" class="card-img-top"/>
                            <form style="display: inline; text-align:right" method="POST"
                                action="{{url('product/delPhoto')}}">
                                @csrf
                                <input type="hidden" value="{{'images/prod/'.$data->id.'/'.$filename}}" name='filepath' />
                                <input type="submit" value="Delete" class="btn btn-danger btn-xs"
                                onclick="return confirm('Are you sure ? ');">
                            </form>
                            <br>
                        @endforeach
                    @endif
                    <a class="m-3" href="{{ url('product/uploadPhoto/'.$data->id)  }}">
                        <button class='btn btn-info m-3'>Upload Foto</button>
                    </a>
                    <br>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close"
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Product</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name of Product</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter type">
                    <small class="form-text text-muted">Please write down the type of product here.</small>

                    <br><br>

                    <label>Price of Product</label>
                    <input type="number" class="form-control" name="product_price" placeholder="Enter price">
                    <small class="form-text text-muted">Please write down the price of product here.</small>

                    <br><br>

                    <label>Hotel of Product</label><br>
                    <select name="product_hotel"  class="form-control" >
                        @foreach ($dataHotel as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select><br>
                    <small class="form-text text-muted">Please choose the hotel of product here.</small>

                    <br><br>

                    <label>Available Room of Product</label>
                    <input type="number" class="form-control" name="product_roomNum" placeholder="Enter Number of Room">
                    <small class="form-text text-muted">Please write down the number room of product here.</small>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="product_type" class="form-control" id="product_type">
                        @foreach ($types as $t)
                        <option value="{{$t->id}}"> {{$t->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
            </form>
      </div>
    </div>
</div>

<div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
      <div class="modal-content" >
         <div class="modal-body" id="modalContent">
            {{-- You can put animated loading image here... --}}
         </div>
        </div>
    </div>
</div>

</body>
</html>

@section('javascript')
    <script>
        function getEditForm(product_id)
        {
            $.ajax({
            type:'POST',
            url:'{{route("product.getEditForm")}}',
            data: {
                '_token' : '<?php echo csrf_token() ?>',
                'id': product_id
            },
            success: function(data){
                $('#modalContent').html(data.msg)
            }
            });
        }
    </script>

    <script>
        function deleteDataRemoveTR(product_id)
        {
            $.ajax({
            type:'POST',
            url:'{{route("product.deleteData")}}',
            data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': product_id
            },
            success: function(data){
            if(data.status == "oke")
            {
                $('#tr_'+product_id).remove();
            }
            else{
                alert(data.msg);
            }
            }
            });
        }
    </script>
@endsection
