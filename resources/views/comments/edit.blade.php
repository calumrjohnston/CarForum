<link type="text/css" rel="stylesheet" href="{{ URL::asset('index.css')}}">
<!doctype html>
<html lang = "en">

@extends('layouts.app')

@section('title','Comment')

@section('content')
<head>Edit comment</head>
  <body>
    <div class="card-header">
        <h1> Edit Comment </h1>
      </div>
        <div class="card-body">
          <form method="POST" action="{{ route('comment.update', ['id' => $comment-> id]) }}">
            @csrf
            @method('PUT')
            <p> Edit comment here:  <input type="text" name="comment_content"
                value="{{ old('comment_content') }}"></p>
            <input type="submit" value="Submit">
            <a href="{{ route('modelCars.index') }}" > Cancel </a>
          </form>
    </div>
  </body>
</html>

@endsection
