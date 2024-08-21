<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Global CSS -->
    <link rel="stylesheet" href="/assets/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">

    <style>
      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }
    </style>

    <!-- Local styles for a specific route -->
    @yield('styles')

</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')

    <!-- dynamic content -->
    @yield('content')

    <div class="b-example-divider"></div>

    <!-- footer -->
    @include('layouts.footer')

    <!-- Global JS -->
    <script src="/assets/js/libs/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/libs/jquery.js"></script>
    <script src="/assets/js/general.js"></script>
    
    <!-- Local JavaScripts -->
    @yield('javascripts')
</body>

</html>