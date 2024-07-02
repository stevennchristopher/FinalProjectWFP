@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Update Hotel Product Transaction</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Update Transaction</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<form method="POST" action="{{ route('transaction.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Customer of Transaction</label><br>
        <select name="transaction_customer">
            @foreach ($dataCustomer as $d)
                @if ($data->customer_id == $d->id)
                    <option value="{{$d->id}}" selected>{{$d->name}}</option>
                @else
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endif
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the new customer of the transaction here.</small>

        <br><br>

        <label>Date of Transaction</label><br>
        <input type="datetime-local" name="transaction_date" class="form-control" placeholder="Enter date" value="{{$data->transaction_date}}">
        <small class="form-text text-muted">Please choose the new date of the transaction here.</small><br><br>

        <label>Harga Asli</label><br>
        <input type="text" name="harga_asli" class="form-control" value="{{$data->harga_asli}}">
        <small class="form-text text-muted">Please write down the new price here.</small><br><br>

        <label>Diskon</label><br>
        <input type="text" name="diskon" class="form-control" value="{{$data->diskon}}">
        <small class="form-text text-muted">Please write down the new diskon here.</small><br><br>

        <label>PPN</label><br>
        <input type="text" name="ppn" class="form-control" value="{{$data->ppn}}">
        <small class="form-text text-muted">Please write down the new ppn here.</small><br><br>

        <label>Harga Grand Total</label><br>
        <input type="text" name="harga_grandtotal" class="form-control" value="{{$data->harga_grandtotal}}">
        <small class="form-text text-muted">Please write down the new grand total here.</small>

    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
