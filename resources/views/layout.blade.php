<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BancaMe - @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">
        @yield('css')
        @yield('javascript')
    </head>
    <body>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @yield('navigation')
            </ol>
        </nav>
        <div class="container" id="content-container">
            @yield('content')
        </div>
    @yield('script')
    </body>
</html>
