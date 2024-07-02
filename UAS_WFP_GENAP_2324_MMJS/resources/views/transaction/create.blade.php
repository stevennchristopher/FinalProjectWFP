@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">Form Create Hotel Product Transaction</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Create Transaction</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
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

        <div id="productContainer">
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="transaction_product[]" class="form-control">
                    @foreach ($dataProduct as $data)
                        <option value="{{$data->id}}">{{$data->name}} from {{$data->hotels->name}} (Type: {{$data->tipeproduks->nama}})</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Please choose the product of the transaction here.</small>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="transaction_product_quantity[]" class="form-control" placeholder="Enter quantity">
                <small class="form-text text-muted">Please fill the quantity of product here.</small>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="transaction_product_subtotal[]" class="form-control" placeholder="Enter price">
                <small class="form-text text-muted">Please fill the price of product here.</small>
            </div>
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        </div>

        <div class="form-group">
                <label for="price">Real Price</label>
                <input type="number" name="harga_asli" class="form-control" placeholder="Enter real price">
                <small class="form-text text-muted">Please fill the real price here.</small>
            </div>
            <div class="form-group">
                <label for="price">Diskon</label>
                <input type="number" name="diskon" class="form-control" placeholder="Enter diskon">
                <small class="form-text text-muted">Please fill the diskon here.</small>
            </div>
            <div class="form-group">
                <label for="price">Ppn</label>
                <input type="number" name="ppn" class="form-control" placeholder="Enter ppn">
                <small class="form-text text-muted">Please fill the ppn here.</small>
            </div>
            <div class="form-group">
                <label for="price">Grand Total Price</label>
                <input type="number" name="harga_grandtotal" class="form-control" placeholder="Enter grand total price">
                <small class="form-text text-muted">Please fill the grand total price here.</small>
            </div>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" id="addProduct" class="btn btn-info">Add Another Product</button>
</form>

<script>
document.getElementById('addProduct').addEventListener('click', function() {
    let productSection = document.createElement('div');
    productSection.innerHTML = `
    <br>
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="transaction_product[]" class="form-control">
                @foreach ($dataProduct as $data)
                    <option value="{{$data->id}}">{{$data->name}} from {{$data->hotels->name}} (Type: {{$data->tipeproduks->nama}})</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Please choose the product of the transaction here.</small>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="transaction_product_quantity[]" class="form-control" placeholder="Enter quantity">
            <small class="form-text text-muted">Please fill the quantity of product here.</small>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="transaction_product_subtotal[]" class="form-control" placeholder="Enter price">
            <small class="form-text text-muted">Please fill the price of product here.</small>
        </div>
        -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    `;
    document.getElementById('productContainer').appendChild(productSection);
});
</script>
@endsection
