@extends('layouts.master')

@section('master.title')@yield('app.master.title')@endsection
@section('master.body.id', 'body')


@push('master.style')
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ css_asset('toastr.min') }}" type="text/css">
    <link rel="stylesheet" href="{{ css_asset('app') }}" type="text/css">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@endpush

@section('master.body')
    <div id="toaster"></div>
    <div class="wrapper">
        @include('partials.app.side-bar')
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- Search form -->
                    <div class="search-form d-none d-lg-inline-block">
                        <div class="input-group">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <input type="text" name="query" id="search-input" class="form-control" placeholder="Rechercher..."
                                   autofocus autocomplete="off" />
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>
                    @include('partials.app.nav-menu')
                </nav>
            </header>
            <!-- Body content -->
            <div class="content-wrapper">
                <div class="content">@yield('app.master.body')</div>
            </div>
            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>&copy; Copyright Reserved to {{ config('app.name') }}</p>
                </div>
            </footer>
        </div>
    </div>
@endsection

@push('master.script')
    <script src="{{ js_asset('jquery.slimscroll.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('toastr.min') }}" type="text/javascript"></script>
    <script src="{{ js_asset('app') }}" type="text/javascript"></script>
@endpush
