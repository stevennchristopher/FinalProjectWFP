<form method="POST" action="{{ route('customer.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Customer</label>
        <input type="text" class="form-control" id="input_name" name="customer_name" placeholder="Enter name" value="{{$data->name}}">
        <small class="form-text text-muted">Please write down the new name of customer here.</small>

        <br><br>

        <label>Address of Customer</label>
        <input type="text" class="form-control" id="input_address" name="customer_address" placeholder="Enter address" value="{{$data->address}}">
        <small class="form-text text-muted">Please write down the new address of customer here.</small>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
