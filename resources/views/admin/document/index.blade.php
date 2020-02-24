@extends('layouts.app', [
    'layout' => 'admin',
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
                    <h2>Liste des documents</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($documents as $document)
                            <div class="col-sm-12 col-lg-6 col-xl-3 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title text-primary border-bottom border-primary">{{ $document->code }}</h6>
                                        <img class="card-img-top rounded mb-2" src="{{ $document->src }}" alt="..."/>
                                        <p class="card-text pb-2">{{ $document->name }}</p>
                                        <a href="{{ route('admin.domains.show', [$document->domain]) }}">
                                            <span class="badge badge-primary">{{ $document->domain->name }}</span>
                                        </a>
                                        <div class="border-top border-primary text-right mt-2 pt-2">
                                            <button class="btn btn-sm btn-primary" data-toggle="popover"
                                                    title="Description" data-content="{{ $document->description }}">
                                                ...
                                            </button>
                                            <button class="btn btn-sm btn-warning text-white"
                                                title="Modifier">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Supprimer">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
