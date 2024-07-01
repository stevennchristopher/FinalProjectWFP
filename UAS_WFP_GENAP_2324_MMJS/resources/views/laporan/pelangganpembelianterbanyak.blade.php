@extends('layouts.conquer2')
@section('content')

<div class="container">
<h2 class="page-title">Laporan Pelanggan Pembelian Terbanyak</h2>

<table class="table">
<thead>
<tr>
<th>Name Pelanggan</th>
<th>Jumlah Pembelian</th>
</tr>
</thead>
<tbody>
@foreach ($data as $d)
<tr>

<td>{{$d->namapelanggan}}</td>
<td>{{$d->jumlahpembelian}}</td>

</tr>
@endforeach
</tbody>
</table>
<a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
</div>

@endsection
