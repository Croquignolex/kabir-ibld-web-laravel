@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="row">
    @forelse($contributors as $contributor)
        <div class="col-lg-6 col-xl-4">
            <div class="card card-default p-4">
                <a href="javascript:void(0)" class="media text-secondary">
                    <img src="{{ $contributor->src }}" class="mr-3 img-fluid rounded" alt="..." width="100px" height="100px">
                    <div class="media-body">
                        <h5 class="mt-0 mb-2 text-dark">{{ $contributor->name }}</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-map mr-1"></i>
                                <span>{{ $contributor->address }}</span>
                            </li>
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-email mr-1"></i>
                                <span>{{ $contributor->email }}</span>
                            </li>
                            <li class="d-flex mb-1">
                                <i class="mdi mdi-phone mr-1"></i>
                                <span>{{ $contributor->phone }}</span>
                            </li>
                            @if(!($domain_page ?? false))
                                <li class="d-flex mb-1">
                                    <i class="mdi mdi-folder-multiple-outline mr-1"></i>
                                    <span class="badge badge-pill badge-primary">{{ $contributor->domain->name }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </a>
                <div class=" mt-2">
                    <button class="btn btn-sm btn-secondary" data-toggle="popover"
                            title="Description" data-content="{{ $contributor->description }}">
                        ...
                    </button>
                    @if($user->role->type !== \App\Models\Role::USER)
                        <a class="btn btn-warning btn-sm text-white" title="Modifier"
                           href="{{ route('admin.contributors.edit', [$contributor]) }}">
                            <i class="mdi mdi-square-edit-outline"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" title="Supprimer"
                                data-target="#delete-contributor-modal-{{ $contributor->id }}">
                            <i class="mdi mdi-trash-can-outline"></i>
                        </button>
                    @else
                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#mail-modal-{{ $contributor->id }}">
                            <i class="mdi mdi-email"></i>
                            Envouyer un mail
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @if($user->role->type !== \App\Models\Role::USER)
            @component('components.delete-modal', [
                'id' => 'delete-contributor-modal-' . $contributor->id,
                'title' => 'Supprimer ' . $contributor->name,
                'message' => 'Vous ne pourrez plus consulter cet intervenant, les documents, les intervenants et les messages associés, êtes vous sûr?',
                'route' => route('admin.contributors.destroy', [$contributor])
            ])
            @endcomponent
        @else
            <div class="modal fade" id="mail-modal-{{ $domain->id }}" tabindex="-1" role="dialog" aria-labelledby="label-subscribe-modal-{{ $domain->id }}" aria-hidden="true">
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
        <div class="text-center col-12">
            <div class="alert alert-primary text-primary" role="alert">
                Pas d'intervenants disponible
            </div>
        </div>
    @endforelse
</div>
