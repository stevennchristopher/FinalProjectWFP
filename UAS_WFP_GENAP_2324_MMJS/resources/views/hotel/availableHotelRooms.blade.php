@extends('layouts.conquer2')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@section('content')
<div class="container">
  <h2>Reporting</h2>
  <p>Report of currently available rooms for each hotel:</p>
  <table class="table">
    <thead>
      <tr>
        <th>Hotel ID</th>
        <th>Hotel Name</th>
        <th>Total Available Room(s)</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->room}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection

</body>
</html>
