<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logo.jpg" type="image/x-icon">
    <title>Коноковская Школа №15</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">

    @include('layouts.stiles')
    @yield('styles')

</head>

<body>

@include('layouts.header')

@yield('content');

@include('layouts.footer')
@include('layouts.scripts')
@yield('scripts')


</body>

</html>