@extends('layouts.app', [
    'breadcrumb_name' => 'Documents',
    'breadcrumb_icon' => 'mdi mdi mdi-file-find-outline',
    'breadcrumb_chain' => ['Documents']
])

@section('app.master.title', page_title('Tous les documents'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Liste des documents ({{ $documents->count() }})</h2>
                </div>
                <div class="card-body">
                    @include('partials.admin.documents-card', compact('documents'))
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
