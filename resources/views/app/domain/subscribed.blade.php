@extends('layouts.app', [
    'breadcrumb_name' => 'Domaines',
    'breadcrumb_icon' => 'mdi mdi-folder-search',
    'breadcrumb_chain' => ['Souscrit']
])

@section('app.master.title', page_title('Domaines soucrit'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Domaines soucrit ({{ $domains->count() }})</h2>
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
                                        <span class="mb-2 badge badge-pill badge-primary">{{ $domain->country->fr_name }}</span>
                                        <span class="mb-2 badge badge-pill badge-success">Membre</span>
                                        <p>{{ $domain->description }}</p>
                                        <p class="text-right">
                                            <a class="btn btn-success mt-2 btn-sm" href="{{ route('domains.show', [$domain]) }}">
                                                <i class="mdi mdi-eye"></i>
                                                Détails
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <div class="alert alert-primary text-primary" role="alert">
                                    Pas de domaines souscrit
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
