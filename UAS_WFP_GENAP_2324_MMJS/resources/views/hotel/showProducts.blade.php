<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Products of hotel : {{$nama}}</h4>
  </div>
  <div class="modal-body">
        @foreach($data as $d)
        <p style='m-5'>Name of Product: {{ $d->name }}</p>
        <p style='m-5'>Rp. {{ $d->price }}</p>
        <a href="{{ url('product/'.$d->id) }}">
            <button class='btn btn-info'>Detail</button>
        </a>
        <br><br>
        @endforeach
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
