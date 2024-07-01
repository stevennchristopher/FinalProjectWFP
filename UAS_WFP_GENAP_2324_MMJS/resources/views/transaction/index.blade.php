@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Transaction
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
            <a href="#">Transaction</a>
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
    @can('delete-permission', Auth::user())
    <a href="{{ route('transaction.create') }}" class="btn btn-success">+ New Transaction</a>

    {{-- <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Transaction(with Modals)</a> --}}
    @endcan
    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Tanggal Transaction</th>
                <th>Harga Asli</th>
                <th>Diskon</th>
                <th>PPN</th>
                <th>Grand Total</th>
                <th>Action Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id="tr_{{$d->id}}">
                <td>{{ $d->id }}</td>
                <td>{{ $d->customers->name }}</td>
                <td>{{ $d->transaction_date }}</td>
                <td>Rp{{ $d->harga_asli }},-</td>
                <td>Rp{{ $d->diskon }},-</td>
                <td>Rp{{ $d->ppn }},-</td>
                <td>Rp{{ $d->harga_grandtotal }},-</td>
                <td>
                    <a class="btn btn-default" data-toggle="modal" href="#myModal" onclick="getDetailData({{ $d->id}});">Lihat Rincian Pembelian</a>

                    <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog modal-wide">
                                <div class="modal-content" id="msg">
                                <!--loading animated gif can put here-->
                                </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('transaction.edit', $d->id)}}">Edit</a><br><br>
                    @can('delete-permission', Auth::user())
                    <form method="POST" action="{{route('transaction.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete transaction ID {{$d->id}} with customer {{$d->customers->name}} ? ');">
                    </form>
                    @endcan
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
          <h4 class="modal-title">Add New Transaction</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('transaction.store') }}">
                @csrf
                <div class="form-group">
                    <label>Customer of Transaction</label><br>
                    <select name="transaction_customer">
                        @foreach ($dataCustomer as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select><br>
                    <small class="form-text text-muted">Please choose the customer of the transaction here.</small>

                    <br><br>

                    <label>Product of Transaction</label><br>
                    <select name="transaction_product">
                        @foreach ($dataProduct as $data)
                            <option value="{{$data->id}}">{{$data->type}} - {{$data->hotels->name}}</option>
                        @endforeach
                    </select><br>
                    <input type="number" name="transaction_product_quantity" class="form-control" placeholder="Enter quantity">
                    <input type="number" name="transaction_product_subtotal" class="form-control" placeholder="Enter subtotal">
                    <small class="form-text text-muted">Please choose and fill the product of the transaction here.</small>
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
    function getDetailData(id) {
        $.ajax({
            type:'POST',
            url:'{{route("transaction.showAjax")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });
    }
</script>

<script>
    function getEditForm(transaction_id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("transaction.getEditForm")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': transaction_id
        },
        success: function(data){
            $('#modalContent').html(data.msg)
        }
        });
    }
</script>

<script>
    function deleteDataRemoveTR(transaction_id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("transaction.deleteData")}}',
        data: {
        '_token' : '<?php echo csrf_token() ?>',
        'id': transaction_id
        },
        success: function(data){
        if(data.status == "oke")
        {
            $('#tr_'+transaction_id).remove();
        }
        else{
            alert(data.msg);
        }
        }
        });
    }
</script>
@endsection
