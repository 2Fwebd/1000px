<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') &mdash; 1000px</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">

    </head>

    <body>

        <div id="app-wrapper">

            <section id="app-content">
                @yield('content')
            </section>

            <footer id="app-footer" class="text-center">
                <p>&copy; 2017 François Forest - Photos can be found on <a href="https://500px.com" target="_blank">500px</a></p>
            </footer>

        </div>

        <script type="text/javascript" src="{{ url('js/app.min.js') }}"></script>

    </body>
</html>