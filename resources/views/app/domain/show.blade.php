@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

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
                        @if(session()->has('popup.message'))
                            <div class="text-center">
                                <div class="alert alert-{{ session('popup.type') }} text-{{ session('popup.type') }}" role="alert">
                                    {{ session('popup.message') }}
                                </div>
                            </div>
                        @endif
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
                                    <button class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#mail-modal">
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
    <div class="modal fade" id="mail-modal" tabindex="-1" role="dialog" aria-labelledby="label-mail-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="label-mail-modal">
                        Exprimez vous par rapport au domaine <strong>{{ $domain->name }}</strong>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('domains.mail', [$domain]) }}" id="mail-modal-form">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' => old('name') ?? $user->format_full_name,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Email',
                            'id' => 'email',
                            'icon' => 'mdi mdi-email',
                            'type' => 'email',
                            'value' => old('email') ?? $user->email,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Sujet',
                            'id' => 'subject',
                            'icon' => 'mdi mdi-text',
                            'type' => 'text',
                            'value' => old('subject'),
                        ])
                        @include('partials.form.textarea', [
                            'name' => 'Méssage',
                            'id' => 'message',
                            'icon' => 'mdi mdi-format-align-justify',
                            'value' => old('message'),
                        ])
                        @include('partials.form.checkbox', [
                            'name' => "M'envoyer une copie",
                            'id' => 'copy',
                            'attribute' => old('copy'),
                        ])
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="mdi mdi-cancel"></i>
                        Annuler
                    </button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('mail-modal-form').submit();">
                        <i class="mdi mdi-send"></i>
                        Envoyer
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
