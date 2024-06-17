<form method="POST" action="{{ route('product.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name of Product</label>
        <input type="text" class="form-control" name="product_name" placeholder="Enter type" value="{{$data->name}}">
        <small class="form-text text-muted">Please write down the new type of product here.</small>

        <br><br>

        <label>Price of Product</label>
        <input type="number" class="form-control" name="product_price" placeholder="Enter price" value="{{$data->price}}">
        <small class="form-text text-muted">Please write down the new price of product here.</small>

        <br><br>

        <label>Hotel of Product</label><br>
        <select name="product_hotel" class="form-control">
            @foreach ($dataHotel as $d)
                @if ($data->hotel_id == $d->id)
                    <option value="{{$d->id}}" selected>{{$d->name}}</option>
                @else
                    <option value="{{$d->id}}">{{$d->name}}</option>
                @endif
            @endforeach
        </select><br>
        <small class="form-text text-muted">Please choose the new hotel of product here.</small>

        <br><br>

        <label>Avaialble Room of Product</label>
        <input type="number" class="form-control" name="product_roomNum" placeholder="Enter Number of Room" value="{{$data->available_room}}">
        <small class="form-text text-muted">Please write down the new number room of product here.</small>
        <br><br>
        <label>Type of Product</label><br>
        <select name="product_type" class="form-control">
            @foreach ($types as $t)
                @if ($t->tipeproduk_id == $t->id)
                    <option value="{{$t->id}}" selected>{{$t->nama}}</option>
                @else
                    <option value="{{$t->id}}">{{$t->nama}}</option>
                @endif
            @endforeach
        </select><br>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
