@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Customer
<small>table</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Customer</a>
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

    {{-- <a href="{{ route('customer.create') }}" class="btn btn-success">+ New Customer</a> --}}

    {{-- <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Customer(with Modals)</a> --}}

    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id="tr_{{$d->id}}">
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->address }}</td>
                <td>
                    {{-- <a class="btn btn-warning" href="{{ route('customer.edit', $d->id)}}">Edit</a> --}}

                    <a href="#modalEditA" class="btn btn-warning" data-toggle="modal" onclick="getEditForm({{$d->id}})">Edit</a>

                    {{-- <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ')) deleteDataRemoveTR({{$d->id}})">Delete without Reload</a> --}}

                    {{-- <form method="POST" action="{{route('customer.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
                    </form> --}}
                </td>
            </tr>
            @endforeach
    </table>
</div>
@endsection

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close"
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Customer</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('customer.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name of Customer</label>
                    <input type="text" class="form-control" id="input_name" name="customer_name" placeholder="Enter name">
                    <small class="form-text text-muted">Please write down the name of customer here.</small>

                    <br><br>

                    <label>Address of Customer</label>
                    <input type="text" class="form-control" id="input_address" name="customer_address" placeholder="Enter address">
                    <small class="form-text text-muted">Please write down the address of customer here.</small>
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

@section('javascript')
    <script>
        function getEditForm(customer_id)
        {
            $.ajax({
            type:'POST',
            url:'{{route("customer.getEditForm")}}',
            data: {
                '_token' : '<?php echo csrf_token() ?>',
                'id': customer_id
            },
            success: function(data){
                $('#modalContent').html(data.msg)
            }
            });
        }
    </script>

    <script>
        function deleteDataRemoveTR(customer_id)
        {
            $.ajax({
            type:'POST',
            url:'{{route("customer.deleteData")}}',
            data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': customer_id
            },
            success: function(data){
            if(data.status == "oke")
            {
                $('#tr_'+customer_id).remove();
            }
            else{
                alert(data.msg);
            }
            }
            });
        }
    </script>
@endsection
