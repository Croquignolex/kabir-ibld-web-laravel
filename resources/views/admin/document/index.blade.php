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
                                        <h5 class="card-title text-primary">{{ $document->code }}</h5>
                                        <img class="card-img-top rounded mb-4" src="{{ $document->src }}" alt="...">
                                        <p class="card-text pb-2">{{ $document->name }}</p>
                                        <a href="{{ route('admin.domains.show', [$document->domain]) }}">
                                            <span class="badge badge-primary">{{ $document->domain->name }}</span>
                                        </a>
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
