@extends('layouts.conquer2')
@section('content')

<div class="container">
<h2 class="page-title">Laporan</h2>

<table class="table">
<thead>
<tr>
<th>Pelanggan dengan Poin Membership  Terbanyak</th>
<th>Pelanggan dengan Pembelian Terbanyak</th>
<th>Hotel dengan Reservasi Terbanyak</th>
</tr>
</thead>
<tbody>
<tr>

<td><a href="{{ route('laporanpoinmembershipterbanyak') }}">Lihat</a><br></td>
<td><a href="{{ route('laporanpelangganpembelianterbanyak') }}">Lihat</a><br></td>
<td><a href="{{ route('laporanhotelreservasiterbanyak') }}">Lihat</a></td>

</tr>
</tbody>
</table>
</div>

@endsection
  



