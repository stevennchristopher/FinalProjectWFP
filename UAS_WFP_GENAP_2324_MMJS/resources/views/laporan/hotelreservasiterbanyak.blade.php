@extends('layouts.conquer2')
@section('content')

<div class="container">
<h2 class="page-title">Laporan Reservasi Hotel Terbanyak</h2>

<table class="table">
<thead>
<tr>
<th>Name Hotel</th>
<th>Jumlah Reservasi</th>
</tr>
</thead>
<tbody>
@foreach ($data as $d)
<tr>

<td>{{$d->namahotel}}</td>
<td>{{$d->jumlahreservasi}}</td>

</tr>
@endforeach
</tbody>
</table>
<a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
</div>

@endsection
