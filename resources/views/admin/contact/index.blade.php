@extends('layouts.app', [
    'breadcrumb_name' => 'Méssages',
    'breadcrumb_icon' => 'mdi mdi-email-open-outline',
    'breadcrumb_chain' => ['Outils', 'Méssages']
])

@section('app.master.title', page_title('Méssages'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les méssages ({{ $contacts->count() }})</h2>
                </div>
                <!-- Table -->
                <div class="card-body">
                    @include('partials.admin.contacts-table', compact('contacts'))
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
