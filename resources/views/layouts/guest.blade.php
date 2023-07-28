<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body class="scroll-bar">
    @include('partial.header');
    @yield('content')
    @yield('js')
    @include('partial.footer');
</body>
</html>