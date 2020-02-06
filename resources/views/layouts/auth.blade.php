@extends('layouts.master')

@section('master.title')@yield('auth.master.title')@endsection

@push('master.style')
    <link rel="stylesheet" href="{{ css_asset('app') }}" type="text/css">
@endpush

@section('master.body')
    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="app-brand">
                            <a href="{{ route('home') }}">
                                <img src="{{ img_asset('logo') }}" alt="..." width="50">
                                <span class="brand-name">{{ config('app.name') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="text-dark mb-4">@yield('auth.master.page')</h4>
                        @if(session()->has('popup.message'))
                            <div class="text-center">
                                <div class="alert alert-{{ session('popup.type') }} alert-dismissable text-danger" role="alert">
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('popup.message') }}
                                </div>
                            </div>
                        @endif
                        @yield('auth.master.body')
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright pl-0">
            <p class="text-center">
                &copy; Copyright Reserved to {{ config('app.name') }}
            </p>
        </div>
    </div>
@endsection
