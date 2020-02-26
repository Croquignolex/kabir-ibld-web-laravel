@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Itervenants',
    'breadcrumb_icon' => 'mdi mdi-account-search-outline',
    'breadcrumb_chain' => ['Itervenants']
])

@section('app.master.title', page_title('Tous les intervenants'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les intervenants</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    @include('partials.admin.contributors-card', compact('contributors'))
                </div>
            </div>
        </div>
    </div>
@endsection
