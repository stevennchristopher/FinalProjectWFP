@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Fasilitas
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
            <a href="#">Fasilitas</a>
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

    <a href="{{ route('fasilitas.create') }}" class="btn btn-success">+ New Fasilitas</a>

    <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Description(with Modals)</a>

    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id="tr_{{$d->id}}">
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->description }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('fasilitas.edit', $d->id)}}">Edit</a>

                    <form method="POST" action="{{route('fasilitas.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</div>
@endsection

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close"
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Fasilitas</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('fasilitas.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name of Fasilitas</label>
                    <input type="text" class="form-control" id="input_name" name="fasilitas_name" placeholder="Enter name">
                    <small class="form-text text-muted">Please write down the name of fasilitas here.</small>

                    <br><br>

                    <label>Description of Fasilitas</label>
                    <input type="text" class="form-control" id="input_address" name="fasilitas_description" placeholder="Enter address">
                    <small class="form-text text-muted">Please write down the description of fasilitas here.</small>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
            </form>
      </div>
    </div>
</div>
