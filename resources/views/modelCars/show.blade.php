<link type="text/css" rel="stylesheet" href="{{ URL::asset('index.css')}}">
<!doctype html>
<html lang = "en">

@extends('layouts.app')

@section('title','Model Details')

@section('content')
<head>

</head>

<body>
  <div class="card-header">
    Car Model Details:
  </div>
  <div class="card-body">
    <ul>
        <li>Model Name: {{$modelCar->name}}</li>
        <li>Number of Doors: {{$modelCar->doors}}</li>
        <li>Engine Size: {{$modelCar->engine_size}}</li>
        <li>Brand ID: {{$modelCar->brand_id}}</li>
        <li>Comments:
            @foreach ($modelCar->comments as $comment)
            <p>Posted by:  {{ $comment->user->email }} </p>
            <p>They say:  {{ $comment->comment_content }} </p>
            @if ($comment->user-> id == Auth::user()->id)
              <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" > Edit Comment </a>
            @endif
            @endforeach
          </li>
          <li>
          <form method="POST" action="{{ route('comment.store') }}">

              @csrf
              <p> New Comment: <input type="text" name="comment_content"
                  value="{{ old('content') }}"></p>
              <input type="hidden" name="model_id" value="{{ $modelCar->id }}">
              <input type="submit" value="Submit">
          </form>

          </li>
          <li>
            <a href="{{ route('modelCars.index') }}"> Back </a>
          </li>


    </ul>

    </div>
