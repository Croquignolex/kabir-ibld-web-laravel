<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('master.title')</title>

    @stack('master.style.plugin')
{{--    <link rel="stylesheet" href="{{ css_asset('master') }}" type="text/css">--}}
    @stack('master.style.page')

    <!--Start Favicon Area-->
    <link rel="icon" href="{{ favicon_img_asset('favicon-32x32') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ favicon_img_asset('favicon-16x16') }}" sizes="16x16" type="image/png">
    <!--End Favicon Are-->
</head>

<body>
    <div id="loader"></div>
    @yield('master.body')
    @stack('master.script.plugin')
{{--    <script src="{{ js_asset('vue.min') }}" type="text/javascript"></script>--}}
    @stack('master.script.page')
    @include('partials.flash-alert')
</body>
</html>
