<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bulma.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker3.standalone.css') }}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        @yield('head')
    </head>
    <body class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <ul style="display: inline-flex;">
                    <!-- <a class="navbar-item" href="/"><img src="images/logo.png" width="112" height="28"></a> -->
                    <li {{ Request::is('dashboard') ? "class=active" : null }}><a class="navbar-item" href="/dashboard">Home</a></li>
                    <li {{ Request::is('users') ? "class=active" : null }}><a class="navbar-item" href="/users">Members</a></li>
                    <li {{ Request::is('finance') ? "class=active" : null }}><a class="navbar-item" href="/finance">F</a></li>
                    {{-- <li {{ Request::is('setting') ? "class=active" : null }}><a class="navbar-item" href="dashboard">Setting</a></li> --}}
            </ul>
            </div>
        </nav>
        @yield('body')
    </body>
    <footer>@yield('footer')</footer>
</html>
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/vue.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session('message'))
            toastr.options = {
                "closeButton": true,
            }
            toastr.{{session('message')[0]}}("{{session('message')[1]}}");
        @endif

        $( document ).ready(function() {    
            $('#birthday').datepicker({
                daysOfWeekHighlighted: "0"
            });
        });
    </script>
    @include('layouts.error')
    @yield('scripts')



    {{--jacascript.php laracasts/utilities
            'bind_js_vars_to_this_view' => 'layouts.main',
            'js_namespace' => 'window'--}}