@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Services',
    'breadcrumb_icon' => 'mdi mdi-database-search',
    'breadcrumb_chain' => ['Services']
])

@section('app.master.title', page_title('Tous les services'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les services ({{ $services->count() }})</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <div id="services" class="accordion accordion-bordered">
                        @forelse($services as $service)
                            <div class="card">
                                <div class="card-header" id="heading{{ $service->id }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $service->id }}" aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $service->id }}">
                                        <strong><i class="{{ $service->icon }}"></i> {{ $service->name }}</strong>
                                    </button>
                                </div>
                                <div id="collapse{{ $service->id }}" class="collapse {{ $loop->index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $service->id }}" data-parent="#services">
                                    <div class="card-body">
                                        <p>{{ $service->description }}</p>
                                        <p class="text-right">
                                            <a class="btn btn-warning btn-sm text-white" title="Modifier"
                                               href="{{ route('admin.services.edit', [$service]) }}">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                                    data-target="#delete-modal-{{ $service->id }}">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @component('components.delete-modal', [
                                'id' => 'delete-modal-' . $service->id,
                                'title' => 'Supprimer ' . $service->name,
                                'message' => 'Vous ne pourrez plus consulter ce service, êtes vous sûr?',
                                'route' => route('admin.services.destroy', [$service])
                            ])
                            @endcomponent
                        @empty
                            <div class="text-center">
                                <div class="alert alert-primary text-primary" role="alert">
                                    Pas de services disponible
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
