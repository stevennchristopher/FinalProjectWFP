@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Membership
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
            <a href="#">Membership</a>
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
    <a href="{{ route('membership.create') }}" class="btn btn-success">+ New Membership</a>
    @endcan
    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name of Customer</th>
                <th>Point</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr">
                <td>{{ $d->id }}</td>
                <td>{{ $d->customers->name }}</td>
                <td>{{ $d->point }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('membership.edit', $d->id)}}">Edit</a><br><br>
                    @can('delete-permission', Auth::user())
                    <form method="POST" action="{{route('membership.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->customers->name}} ? ');">
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
    </table>
</div>
@endsection
