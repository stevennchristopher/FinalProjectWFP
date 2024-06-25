@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Product Type 
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
            <a href="#">Product Type</a>
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

    <a href="{{ route('tipeproduk.create') }}" class="btn btn-success">+ New Product Type</a>

    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->nama }}</td>
                
                <td><a class="btn btn-warning" href="{{ route('tipeproduk.edit', $d->id)}}">Edit</a><br><br>
                <form method="POST" action="{{route('tipeproduk.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->nama}} ? ');">
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</div>
@endsection