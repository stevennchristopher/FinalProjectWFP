<form method="POST" action="{{ route('transaction.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Customer of Transaction</label><br>
        <select name="transaction_customer">
            @foreach ($dataCustomer as $d)
                @if ($data->customer_id == $d->id)
                    <option value="{{$d->id}}" selected>{{$d->name}}</option>
                @else
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endif
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the new customer of the transaction here.</small>

        <br><br>

        <label>Date of Transaction</label><br>
        <input type="datetime-local" name="transaction_date" class="form-control" placeholder="Enter date" value="{{$data->transaction_date}}">
        <small class="form-text text-muted">Please choose the new date of the transaction here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
