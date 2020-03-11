@extends('layouts.app', [
    'breadcrumb_name' => 'Domaines',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Tous']
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
                        @if(session()->has('popup.message'))
                            <div class="text-center">
                                <div class="alert alert-{{ session('popup.type') }} text-{{ session('popup.type') }}" role="alert">
                                    {{ session('popup.message') }}
                                </div>
                            </div>
                        @endif
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
                                        @if(!$domain->can_subscribe)
                                            <span class="mb-2 badge badge-{{ $domain->subscription_status[1] }}">{{ $domain->subscription_status[0] }}</span>
                                        @endif
                                        <p>{{ $domain->description }}</p>
                                        @if($domain->can_subscribe)
                                            <p class="text-right">
                                                <button class="btn btn-primary mt-2" data-toggle="modal"
                                                        data-target="#subscribe-modal-{{ $domain->id }}">
                                                    <i class="mdi mdi-folder-account-outline"></i>
                                                    Souscrire
                                                </button>
                                            </p>
                                        @else
                                            @if($domain->can_show)
                                                <p class="text-right">
                                                    <a class="btn btn-success mt-2" href="{{ route('domains.show', [$domain]) }}">
                                                        <i class="mdi mdi-eye"></i>
                                                        Détails
                                                    </a>
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($domain->can_subscribe)
                                <div class="modal fade" id="subscribe-modal-{{ $domain->id }}" tabindex="-1" role="dialog" aria-labelledby="label-subscribe-modal-{{ $domain->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="label-subscribe-modal-{{ $domain->id }}">
                                                    Pourquoi voulez-vous souscrire à ce domaine?
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('domains.subscribe', [$domain]) }}" id="subscribe-modal-form-{{ $domain->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    @include('partials.form.textarea', [
                                                        'name' => 'Réponse',
                                                        'id' => 'reason-' . $domain->id,
                                                        'icon' => 'mdi mdi-format-align-justify',
                                                        'value' => old('reason'),
                                                    ])
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <i class="mdi mdi-cancel"></i>
                                                    Annuler
                                                </button>
                                                <button type="button" class="btn btn-primary" onclick="document.getElementById('subscribe-modal-form-{{ $domain->id }}').submit();">
                                                    <i class="mdi mdi-send"></i>
                                                    Envoyer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
