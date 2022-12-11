<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title', env('APP_NAME'))</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

<div class="container-fluid">
    @include('partials.menu.menu')

    @yield('content', 'Template not provided')

    <footer class="container">
        <p>© {{ env('APP_NAME') }} 2022</p>
    </footer>
</div>

<script src="{{ asset('js/bootstrap.min.css') }}"></script>

</body>
</html>
