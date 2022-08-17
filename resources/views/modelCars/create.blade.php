<link type="text/css" rel="stylesheet" href="{{ URL::asset('create.css')}}">
<!doctype html>
<html lang = "en">

@extends('layouts.app')

@section('title','Model Details')

@section('content')
<head>

</head>

<body>
  <div class="card-header">
    Create a new car model
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('modelCars.store')}}">
      @csrf
        <p>Model Name: <input type="text" name="name"
          value="{{ old('name')}}"></p>
        <p>Number of Doors: <input type="text" name="doors"
          value="{{ old('doors')}}"></p>
        <p>Engine Size: <input type="text" name="engine_size"
          value="{{ old('engine_size')}}"></p>
          <p>Brand:
            <select name="brand_id">
              @<?php foreach ($brands as $brand): ?>
                <option value="{{$brand->id}}"
                  @if ($brand->id == old('brand_id'))
                    selected="selected"
                  @endif
                  >{{$brand->name}}</option>
              <?php endforeach; ?>
            </select>
          </p>
        <input type="submit" value="Submit">
        <a href="{{ route('modelCars.index')}}">Cancel</a>
    </form>
  </div>

</body>

@endsection
</html>
