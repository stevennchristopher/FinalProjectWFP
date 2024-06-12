<form method="POST" action="{{ route('type.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Type</label>
        <input type="text" class="form-control" id="input_name" name="type_name" placeholder="Enter name" value="{{ $data->name }}">
        <small class="form-text text-muted">Please write down the new name of type here.</small>

        <br><br>

        <label>Description of Type</label>
        <input type="text" class="form-control" id="input_desc" name="type_desc" placeholder="Enter desc" value="{{ $data->description }}">
        <small class="form-text text-muted">Please write down the new desc of type here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
