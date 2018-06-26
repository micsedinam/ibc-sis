<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EDU-HUB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: f2f2f7;
                color: #03023b;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
                color: #03023b;
            }

            .links > a {
                color: #03023b;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="#"></a>
                        <a href="#"></a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    WELCOME TO EDU-HUB
                </div>

                <div class="links">
                    <a href="{{url('admin/')}} ">Admin Login</a>
                   {{--  <a href="{{url('guardian/')}} ">Guardian Login</a> --}}
                    <a href="{{url('staff/')}} ">Staff Login</a>
                    <a href="{{url('home/')}} ">Student Login</a>
                </div>
            </div>
        </div>
    </body>
</html>
