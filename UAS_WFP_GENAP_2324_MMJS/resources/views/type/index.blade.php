@extends('layouts.conquer2')

@section('content')
<h3 class="page-title">
Type
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
            <a href="#">Type</a>
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

    <a href="{{ route('type.create') }}" class="btn btn-success">+ New Type</a>

    {{-- <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Type(with Modals)</a> --}}

    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                {{-- <th>Deleted at</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id="tr_{{$d->id}}">
                <td>{{ $d->id }}</td>
                <td id="td_name_{{$d->id}}">{{ $d->name }}</td>
                <td id="td_description_{{$d->id}}">{{ $d->description }}</td>
                {{-- <td>{{ $d->deleted_at }}</td> --}}
                <td>
                    <a class="btn btn-warning" href="{{ route('type.edit', $d->id)}}">Edit</a><br><br>

                    {{-- <a href="#modalEditA" class="btn btn-warning" data-toggle="modal" onclick="getEditForm({{$d->id}})">Edit Type A</a> --}}

                    {{-- <a href="#modalEditB" class="btn btn-info" data-toggle="modal" onclick="getEditFormB({{$d->id}})">Edit Type B</a> --}}

                    @can('delete-permission', Auth::user())
                    <form method="POST" action="{{route('type.destroy', $d->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ');">
                    </form>
                    <!-- <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{$d->id}} - {{$d->name}} ? ')) deleteDataRemoveTR({{$d->id}})">Delete without Reload</a> -->
                    @endcan

                   
                </td>
                {{-- <td>
                    <a class="btn btn-warning" href="{{ route('type.edit', $d->id)}}">Edit</a>
                </td> --}}
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
          <h4 class="modal-title">Add New Type</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('type.store') }}">
                @csrf
                <div class="form-group">
                <label>Name of Type</label>
                <input type="text" class="form-control" id="input_name" name="type_name" placeholder="Enter name">
                <small class="form-text text-muted">Please write down the name of type here.</small>

                <br><br>

                <label>Description of Type</label>
                <input type="text" class="form-control" id="input_desc" name="type_desc" placeholder="Enter desc">
                <small class="form-text text-muted">Please write down the desc of type here.</small>
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

<div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
     <div class="modal-dialog modal-wide">
       <div class="modal-content" >
          <div class="modal-body" id="modalContent">
             {{-- You can put animated loading image here... --}}
          </div>
         </div>
     </div>
</div>

<div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
     <div class="modal-dialog modal-wide">
       <div class="modal-content" >
         <div class="modal-body" id="modalContentB">
           {{-- You can put animated loading image here... --}}
         </div>
       </div>
     </div>
</div>
/
@section('javascript')
<script>
    function getEditForm(type_id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("type.getEditForm")}}',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'id': type_id
        },
        success: function(data){
            $('#modalContent').html(data.msg)
        }
        });
    }
</script>

<script>
    function getEditFormB(type_id)
    {
        $.ajax({
        type:'POST',
        url:'{{route("type.getEditFormB")}}',
        data: {
        '_token' : '<?php echo csrf_token() ?>',
        'id': type_id
        },
        success: function(data){
        $('#modalContentB').html(data.msg)
        }
        });
    }
</script>

<script>
function saveDataUpdateTD(type_id)
 {
  var eName = $('#eName').val();
  console.log(eName);  //debug->print to browser console

  var eDesc = $('#eDesc').val();
  console.log(eDesc); //debug->print to browser console
  $.ajax({
   type:'POST',
   url:'{{route("type.saveDataTD")}}',
   data: {
    '_token' : '<?php echo csrf_token() ?>',
    'id': type_id,
    'description': eDesc,
    'name':eName
   },
   success: function(data){
    if(data.status == "oke")
    {
     $('#td_name_'+ type_id).html(eName);
     $('#td_description_'+type_id).html(eDesc);
     $('#modalEditB').modal('hide');
    }
   }
  })
 }
</script>

<script>
function deleteDataRemoveTR(type_id)
 {
  $.ajax({
   type:'POST',
   url:'{{route("type.deleteData")}}',
   data: {
    '_token' : '<?php echo csrf_token() ?>',
    'id': type_id
   },
   success: function(data){
    if(data.status == "oke")
    {
     $('#tr_'+type_id).remove();
    }
    else{
        alert(data.msg);
    }
   }
  });
 }
</script>
@endsection
