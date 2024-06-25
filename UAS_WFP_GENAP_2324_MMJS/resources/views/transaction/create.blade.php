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
            <label>Product of Transaction</label><br>
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="transaction_product[]" class="form-control">
                    @foreach ($dataProduct as $data)
                        <option value="{{$data->id}}">{{$data->name}} from {{$data->hotels->name}} (Type: {{$data->tipeproduks->nama}})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="transaction_product_quantity[]" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="transaction_product_subtotal[]" class="form-control">
            </div> --}}
        </div>

        {{-- <label>Product of Transaction</label><br>
        <select name="transaction_product">
            @foreach ($dataProduct as $data)
                <option value="{{$data->id}}">{{$data->type}} - {{$data->hotels->name}}</option>
            @endforeach
        </select><br>
        <input type="number" name="transaction_product_quantity" class="form-control" placeholder="Enter quantity">
        <input type="number" name="transaction_product_subtotal" class="form-control" placeholder="Enter subtotal">
        <small class="form-text text-muted">Please choose and fill the product of the transaction here.</small> --}}
    </div>
    <button type="button" id="addProduct" class="btn btn-secondary">Add Another Product</button>
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>

<script>
document.getElementById('addProduct').addEventListener('click', function() {
    let productSection = document.createElement('div');
    productSection.innerHTML = `
    <br><br>
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="transaction_product[]" class="form-control">
                @foreach ($dataProduct as $data)
                    <option value="{{$data->id}}">{{$data->type}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="transaction_product_quantity[]" class="form-control">
        </div>
    `;
    document.getElementById('productContainer').appendChild(productSection);
});
</script>
@endsection
