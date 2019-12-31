<!DOCTYPE html>

<html lang="fr">
    <head>
        {{--Meta tags--}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Page title--}}
        <title>@yield('master.title')</title>

        {{--Css files--}}
        @stack('master.style')
        <link rel="stylesheet" href="{{ css_asset('master') }}" type="text/css">

        {{--Favicons--}}
        <link rel="icon" href="{{ favicon_img_asset('favicon-32x32') }}" sizes="32x32" type="image/png" />
        <link rel="icon" href="{{ favicon_img_asset('favicon-16x16') }}" sizes="16x16" type="image/png" />
    </head>

    <body id="page-top">
        {{--Full screen page loader--}}
        <div id="loader"></div>

        {{--Page body content--}}
        @yield('master.body')

        {{--Js files--}}
        @stack('master.script')
        <script src="{{ js_asset('master') }}" type="text/javascript"></script>

        {{--Flash alert js code--}}
        @include('partials.flash-alert')
    </body>
</html>
