<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Swanse Foreign Cars</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top {
              font-size: 20px;
              letter-spacing: .1rem;
            	align-items: center;
            	display: flex;
            	position: absolute;
            	left: 50%;
            	transform: translate(-50%);
            	top: 18px;
            }

            .content {
                background: rgba(74, 74, 74, 0.7);
                text-align: center;
                height: 80px;
                width: 400px;
                margin: 100px;
                border: 10px solid rgba(255,255,255,.7);
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ebebeb;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            a:hover{
              color: #e6da02
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


                <div class="top">
                  Swansea Foriegn Cars
                </div>

            <div class="content">
                <div class="title m-b-md">
                  </div>
                  @if (Route::has('login'))
                    <div class="links">
                      @auth
                          <a href="{{ url('/home') }}">Home</a>
                      @else
                          <a href="{{ route('login') }}">Login</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}">Register</a>
                          @endif
                      @endauth
                  </div>
              @endif
            </div>
        </div>
    </body>
</html>
