@extends('layouts.app', [
    'layout' => 'admin',
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
                            <li class="nav-item">
                                <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts"
                                   aria-selected="false">
                                    <i class="mdi mdi-email-open-outline mr-1"></i> Messages</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane pt-3 fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <ul>
                                    <li><i class="{{ $domain->icon }} text-primary"></i></li>
                                    <li><span class="badge badge-primary">{{ $domain->country->fr_name }}</span></li>
                                    <li>{{ $domain->description }}</li>
                                </ul>
                                <p class="text-right">
                                    <a class="btn btn-warning btn-sm text-white" title="Modifier"
                                       href="{{ route('admin.domains.edit', [$domain]) }}">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                            data-target="#delete-modal">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </button>
                                </p>
                            </div>
                            <div class="tab-pane pt-3 fade" id="contributors" role="tabpanel" aria-labelledby="contributors-tab">
                                @include('partials.admin.contributors-card', ['contributors' => $domain->contributors, 'domain_page' => true])
                            </div>
                            <div class="tab-pane pt-3 fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                                @include('partials.admin.documents-card', ['documents' => $domain->documents, 'domain_page' => true])
                            </div>
                            <div class="tab-pane pt-3 fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                @include('partials.admin.contacts-table', ['contacts' => $domain->contacts, 'domain_page' => true])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @component('components.delete-modal', [
        'id' => 'delete-modal',
        'title' => 'Supprimer ' . $domain->name,
        'message' => 'Vous ne pourrez plus consulter ce domaine, êtes vous sûr?',
        'route' => route('admin.domains.destroy', [$domain])
    ])
    @endcomponent
@endsection

@include('partials.table-page-push')
