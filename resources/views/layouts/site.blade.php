<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/script.js') }}"></script>
    </head>

    <body>
        <div class='container'>
            <div id='content'>
                @yield('content')
           </div>
        </div>
    </body>
</html>