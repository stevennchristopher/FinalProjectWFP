<form method="POST" action="{{ route('product.update', $data->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Type of Product</label>
        <input type="text" class="form-control" name="product_type" placeholder="Enter type" value="{{$data->type}}">
        <small class="form-text text-muted">Please write down the new type of product here.</small>

        <br><br>

        <label>Price of Product</label>
        <input type="number" class="form-control" name="product_price" placeholder="Enter price" value="{{$data->price}}">
        <small class="form-text text-muted">Please write down the new price of product here.</small>

        <br><br>

        <label>Image of Product</label>
        <input type="text" class="form-control" name="product_image" placeholder="Enter image" value="{{$data->image}}">
        <small class="form-text text-muted">Please write down the new image of product here.</small>

        <br><br>

        <label>Hotel of Product</label><br>
        <select name="product_hotel">
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
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

    <a href="{{url()->previous()}}" class="btn btn-danger"><- Back</a>
</form>
