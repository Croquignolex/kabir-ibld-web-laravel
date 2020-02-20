@extends('layouts.master')

@section('master.title')@yield('admin.master.title')@endsection

@push('master.style')
{{--    <link rel="stylesheet" href="{{ css_asset('nprogress') }}" type="text/css">--}}
@endpush

@section('master.body')
    @yield('admin.master.body')
@endsection

@push('master.script')
{{--    <script src="{{ js_asset('nprogress') }}" type="text/javascript"></script>--}}
@endpush
