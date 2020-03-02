@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Domaines',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Domaines']
])

@section('app.master.title', page_title('Tous les domaines'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les domaines ({{ $domains->count() }})</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <div id="domains" class="accordion accordion-bordered">
                        @forelse($domains as $domain)
                            <div class="card">
                                <div class="card-header" id="heading{{ $domain->id }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $domain->id }}" aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $domain->id }}">
                                        <strong><i class="{{ $domain->icon }}"></i> {{ $domain->name }}</strong>
                                    </button>
                                </div>
                                <div id="collapse{{ $domain->id }}" class="collapse {{ $loop->index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $domain->id }}" data-parent="#domains">
                                    <div class="card-body">
                                        <span class="mb-2 badge badge-primary">{{ $domain->country->fr_name }}</span>
                                        <p>{{ $domain->description }}</p>
                                        <p class="text-right">
                                            <a class="btn btn-primary btn-sm" title="Détails"
                                               href="{{ route('admin.domains.show', [$domain]) }}">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm text-white" title="Modifier"
                                               href="{{ route('admin.domains.edit', [$domain]) }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                                    data-target="#delete-modal-{{ $domain->id }}">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            @component('components.delete-modal', [
                                'id' => 'delete-modal-' . $domain->id,
                                'title' => 'Supprimer ' . $domain->name,
                                'message' => 'Vous ne pourrez plus consulter ce domaine, les documents, les intervenants et les messages associés, êtes vous sûr?',
                                'route' => route('admin.domains.destroy', [$domain])
                            ])
                            @endcomponent
                        @empty
                            <div class="text-center">
                                <div class="alert alert-primary text-primary" role="alert">
                                    Pas de domaines disponible
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
