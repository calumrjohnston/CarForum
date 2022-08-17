<link type="text/css" rel="stylesheet" href="{{ URL::asset('index.css')}}">
<!doctype html>
<html lang = "en">

@extends('layouts.app')

@section('title','ModelCars')

@section('content')
<head>

</head>

<body>
  <div class="card-header">
    <p>The admins menu for automobiles of Swansea Foreign Cars</p>
  </div>
  <div class="card-body">
      <ul>
        <?php foreach ($modelCars as $modelCar): ?>
          <li><a href="{{ route('modelCars.show',['modelCar'=>$modelCar]) }}">
            {{$modelCar->name}}</a></li>
            <form method="POST"
            action="{{ route('admin.destroy',['id'=>$modelCar->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
          </form>


        <?php endforeach; ?>
      </ul>
        <a href="{{ route('modelCars.create')}}">Create New Car Model</a>
      {{$modelCars->links()}}

  </div>

</body>

</html>
@endsection
