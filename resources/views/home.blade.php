<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->@extends('layouts.app')
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #1c1c1c;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body {
              background-image: url('swanseaforeigncars.jpg');
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: 100% 100%;
            }
            .card-body {
            	align-items: center;
            	color: #ebebeb;
            	display: flex;
            	justify-content: center;
            	background: rgba(74, 74, 74, 0.7);
            	text-align: center;
            	height: 250px;
            	width: 250px;
            	position: absolute;
            	left: 50%;
            	transform: translate(-50%, -50%);
            	top: 50%;
            	border: 10px solid rgba(255,255,255,.7);
            }
            .card-header {
            	font-size: 20px;
                letter-spacing: .1rem;
            	align-items: center;
            	display: flex;
            	position: absolute;
            	left: 50%;
            	transform: translate(-50%);
            	top: 18px;
            }
            a{
            	color: #ebebeb;
            }
            a:hover{
            	color: #e6da02
            }

        </style>
    </head>
    <body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</html>
