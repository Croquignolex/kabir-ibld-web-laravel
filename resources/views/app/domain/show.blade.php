@extends('layouts.app', [
    'breadcrumb_name' => 'Détails',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Domaines', 'Détails']
])

@section('app.master.title', page_title('Détail du domaine'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Détail du domaine <strong>{{ $domain->name }}</strong></h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <div class="mt-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
                                    <i class="mdi mdi-star mr-1"></i> Général</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contributors-tab" data-toggle="tab" href="#contributors" role="tab" aria-controls="contributors"
                                   aria-selected="false">
                                    <i class="mdi mdi-account-group-outline mr-1"></i> Intervenants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents"
                                   aria-selected="false">
                                    <i class="mdi mdi-file-document-box-multiple-outline mr-1"></i> Documents</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane pt-3 fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <ul>
                                    <li><i class="{{ $domain->icon }} text-primary"></i></li>
                                    <li><span class="badge badge-pill badge-primary">{{ $domain->country->fr_name }}</span></li>
                                    <li>{{ $domain->description }}</li>
                                </ul>
                                <p class="text-right">
                                    <button class="btn btn-primary mt-2 btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                        <i class="mdi mdi-email"></i>
                                        M'exprimer sur ce domaine
                                    </button>
                                </p>
                            </div>
                            <div class="tab-pane pt-3 fade" id="contributors" role="tabpanel" aria-labelledby="contributors-tab">
                                ({{ $domain->contributors->count() }})
                                @include('partials.admin.contributors-card', ['contributors' => $domain->contributors, 'domain_page' => true])
                            </div>
                            <div class="tab-pane pt-3 fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                                ({{ $domain->documents->count() }})
                                @include('partials.admin.documents-card', ['documents' => $domain->documents, 'domain_page' => true])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
