@extends('layouts.frontend')

@section('content')
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            @php
                                $subtotal = 0;
                            @endphp

                            {{-- @if(@session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            @if(@session('error'))
                                <div class="alert alert-danger ">{{ session('error') }}</div>
                            @endif --}}

                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @if (session('cart'))
                                        @foreach (session('cart') as $item)
                                            <tr>
                                                <td>
                                                    <div class="img">
                                                        @if(isset($item['photo[]']))
                                                            @foreach ($item['photo[]'] as $filename)
                                                                <img style="height: 190px" src="{{ asset('images/prod/'.$item['id'].'/'.$filename) }}" class="card-img-top"/><br>
                                                            @endforeach
                                                        @else
                                                            <img src="{{asset('images/blank.jpg')}}">
                                                        @endif
                                                        <p>{{ $item['name'] }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ 'IDR ' . $item['price'] }}</td>
                                                <td>
                                                    <div class="qty">
                                                        <button onclick="redQty({{ $item['id'] }})" class="btn-minus"><i
                                                                class="fa fa-minus"></i></button>
                                                        <input type="text" value="{{ $item['quantity'] }}">
                                                        <button onclick="addQty({{ $item['id'] }})" class="btn-plus"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td>{{ 'IDR ' . $item['quantity'] * $item['price'] }}</td>
                                                <td><a class="btn btn-danger"
                                                        href="{{ route('delFromCart', $item['id']) }}"><i
                                                            class="fa fa-trash"></i></a></td>
                                            </tr>
                                            @php
                                                $subtotal += $item['quantity'] * $item['price'];
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                <p>Tidak ada item di cart.</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                            <h2 style="font-size:20px">Available Points <span>{{$points_remaining}}</span></h2>
                                        <div class="coupon">
                                                <input type="number" name="points" id="points_to_redeem" placeholder="Enter points" min="0" max="{{$points_remaining}}">

                                                <button type="button" onclick="calculateRedeemAmount()">Redeem Points</button>
                                        </div>
                               
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                   
                                        <h1>Cart Summary</h1>
                                        <h2  style="font-size:18px">Subtotal<span>{{'IDR '. number_format($subtotal, 0, ',')}}</span></h2>
                                        @php
                                                $tax = $subtotal * 11/100;
                                                $grandtotal = $subtotal + $tax;
                                                
                                        @endphp
                                        <h2 id="redeem_amount" style="font-size: 18px; display: none;">Diskon Poin<span></span></h2><br>
                                        <h2  style="font-size:18px" id="tax">Tax 11%<span>{{'IDR '.number_format($tax, 0, ',')}}</span></h2>
                                        <h2  style="font-size:18px" id="grandtotal">Grand Total<span>{{'IDR '.number_format($grandtotal, 0, ',')}}</span></h2><br>
                                       

                                </div>
                                

                                    <div class="cart-btn">
                                        <a class="btn btn-xs" href="{{ route('laralux.index') }}">Continue Shopping</button>
                                        <a class="btn btn-xs" href="{{ route('checkout') }}" id="checkoutbtn">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    function redQty(id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("redQty")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': id
        },
        success: function(data){
            location.reload();
        }
        });
    }

    function addQty(id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("addQty")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': id
        },
        success: function(data){
            location.reload();
        }
        });
    }


    function calculateRedeemAmount() {
            var points_to_redeem = document.getElementById('points_to_redeem').value;
            var subtotal = {{$subtotal}};
            var points_remaining = {{$points_remaining}};

            var points_remaining = {{$points_remaining}};

            if (subtotal < 100000) {
                alert('Belanja sebelum tax minimal IDR 100.000');
                return;
            }

            else if (points_to_redeem > points_remaining ) {
                alert('Jumlah poin yang ingin di redeem melebihi jumlah poin yang dimiliki.');
                return;
            }
            else if (points_to_redeem*100000 > subtotal ) {
                alert('Jumlah poin yang ingin di redeem melebihi jumlah belanja.');
                return;
            }


            var redeem_amount = points_to_redeem * 100000; 
            var tax = (subtotal)*11/100;
            var total_after_redeem = subtotal - redeem_amount + tax; 

            var redeemAmountElement = document.getElementById('redeem_amount');
            redeemAmountElement.style.display = 'block';

            document.getElementById('redeem_amount').getElementsByTagName('span')[0].textContent = 'IDR ' + redeem_amount.toLocaleString();
            document.getElementById('grandtotal').getElementsByTagName('span')[0].textContent = 'IDR ' + total_after_redeem.toLocaleString();
            document.getElementById('tax').getElementsByTagName('span')[0].textContent = 'IDR ' + tax.toLocaleString();
        }

    
    </script>
@endsection
