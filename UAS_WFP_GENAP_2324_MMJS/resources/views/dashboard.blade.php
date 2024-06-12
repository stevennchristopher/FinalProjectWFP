@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Dashboard
<small>of Laralux</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<div class="content">
    <h1>Welcome to Laralux!</h1>
    <h3>Made by MMJS</h3>
</div>
@endsection
