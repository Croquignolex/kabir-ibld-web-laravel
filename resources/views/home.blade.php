@extends('layouts.master')

@section('master.title', page_title('Accueil'))

@push('master.style')
    <link rel="stylesheet" href="{{ css_asset('all') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('bootstrap.min') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('landing') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('landing-responsive') }}" type="text/css">
@endpush

@section('master.body')
    {{--Nav bar--}}
    @include('partials.home.nav-bar')

    {{--Banner--}}
    @include('partials.home.banner')

    {{--Features--}}
    @include('partials.home.features')

    {{--About--}}
    @include('partials.home.about')

    {{--Services--}}
    @include('partials.home.services')

    {{--Examples--}}
    @include('partials.home.examples')

    {{--Pricing--}}
    @include('partials.home.pricing')

    {{--Testimonials--}}
    @include('partials.home.testimonials')

    {{--Contact--}}
    @include('partials.home.contact')

    {{--Footer--}}
    @include('partials.home.footer')
@endsection

@push('master.script')
    <script src="{{ js_asset('jquery.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('bootstrap.bundle.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('jquery.easing.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('ajax-contact') }}" type="text/javascript"></script>
    <script src="{{ js_asset('landing') }}" type="text/javascript"></script>
@endpush
