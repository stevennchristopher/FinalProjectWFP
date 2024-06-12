@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Dashboard
<small>statistics and more</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Example</a>
        </li>
    </ul>
    <div class="page-toolbar"></div>
</div>
<div class="content">
    <h1>This is an example</h1>
</div>
@endsection
