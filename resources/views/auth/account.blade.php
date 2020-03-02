@extends('layouts.app', [
    'breadcrumb_name' => 'Mon profil',
    'breadcrumb_icon' => 'mdi mdi-account',
    'breadcrumb_chain' => ['Profil']
])

@section('app.master.title', page_title('Mon profil'))

@section('app.master.body')
    @include('partials.user-account')
@endsection

@include('partials.table-page-push')
