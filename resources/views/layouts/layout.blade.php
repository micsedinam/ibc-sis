<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield ('title') </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    @include('partials.stylesheet')

</head>
<body>

<div class="wrapper">
    @yield('sidebar')

    <div class="main-panel">
        
    @include('partials.top-nav')

        <div class="content">
            <div class="container-fluid">
               
               @yield ('content')
                
            </div>
        </div>


        <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright text-center">
                        @if(Auth::check()) {{Auth::user()->email}} @endif &copy; <script>document.write(new Date().getFullYear())</script>, developed by EDU-HUB for <a href="#">Notre Dame Girls' SHS</a>
                    </div>
                </div>
        </footer>

    </div>
</div>
    @include('partials.javascript')

</body>
</html>

