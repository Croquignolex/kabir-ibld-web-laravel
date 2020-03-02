@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Utilitsateurs',
    'breadcrumb_icon' => 'mdi mdi-settings',
    'breadcrumb_chain' => ['Utilitsateurs']
])

@section('app.master.title', page_title('Tous les Utilitsateurs'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Tous les Utilitsateurs</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <a href="{{ route('admin.users.create') }}"
                       class="btn btn-primary mb-2">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        Ajouter un utilisateur
                    </a>
                    <div class="row">
                        @forelse($users as $user)
                            <div class="col-lg-6 col-xl-4">
                                <div class="card card-default p-4 overflow-auto">
                                    <a href="javascript:void(0)" class="media text-secondary" data-toggle="modal" data-target="#modal-contact-{{ $user->id }}">
                                        <img src="{{ $user->avatar_src }}" class="mr-3 img-fluid rounded" alt="..." width="100px" height="100px">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-2 text-dark">{{ $user->format_full_name }}</h5>
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-1">
                                                    <i class="mdi mdi-worker mr-1"></i>
                                                    <span>{{ $user->profession }}</span>
                                                </li>
                                                <li class="d-flex mb-1">
                                                    <i class="mdi mdi-email mr-1"></i>
                                                    <span>{{ $user->email }}</span>
                                                </li>
                                                <li class="d-flex mb-1">
                                                    <i class="mdi mdi-phone mr-1"></i>
                                                    <span>{{ $user->phone }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- Modal --}}
                            <div class="modal fade" id="modal-contact-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end border-bottom-0">
                                            @php
                                                $can_grant_super_admin_user = $user->can_grant_super_admin_user;
                                                $can_grant_admin_user = $user->can_grant_admin_user;
                                                $can_delete_user = $user->can_delete_user;
                                            @endphp
                                            @if($can_grant_super_admin_user || $can_grant_admin_user || $can_delete_user)
                                                <div class="dropdown">
                                                    <button class="btn-dots-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                        @if($can_grant_super_admin_user)
                                                            <button class="dropdown-item"
                                                                    onclick="document.getElementById('{{ $user->id }}-grant-super-admin').submit();">
                                                                <i class="mdi mdi-account-star text-success"></i>
                                                                Nommer super administrateur
                                                            </button>
                                                        @endif
                                                        @if($can_grant_admin_user)
                                                            <button class="dropdown-item"
                                                                    onclick="document.getElementById('{{ $user->id }}-grant-admin').submit();">
                                                                <i class="mdi mdi-account-key text-primary"></i>
                                                                Nommer administrateur
                                                            </button>
                                                        @endif
                                                        @if($can_delete_user)
                                                            <button class="dropdown-item" data-toggle="modal" data-target="#delete-user-modal-{{ $user->id }}">
                                                                <i class="mdi mdi-trash-can-outline text-danger"></i>
                                                                Supprimer
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                            <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
                                                <i class="mdi mdi-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body pt-0">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <div class="profile-content-left px-4">
                                                        <div class="card text-center widget-profile px-0 border-0">
                                                            <div class="card-img mx-auto rounded-circle">
                                                                <img src="{{ $user->avatar_src }}" alt="user image">
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="py-2 text-dark">{{ $user->format_full_name }}</h4>
                                                                <h5 class="text-dark">({{ $user->profession }})</h5>
                                                                <p>{{ $user->email }}</p>
                                                                <p>{{ $user->phone }}</p>
                                                                <span class="badge badge-primary mt-2">{{ $user->role_name }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="text-dark font-weight-medium pt-3 mb-2">Ville</p>
                                                            <p>{{ $user->city }}</p>
                                                            <p class="text-dark font-weight-medium pt-3 mb-2">Pays</p>
                                                            <p>{{ $user->country }}</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="text-dark font-weight-medium pt-3 mb-2">Code postal</p>
                                                            <p>{{ $user->post_code }}</p>
                                                            <p class="text-dark font-weight-medium pt-3 mb-2">Adresse</p>
                                                            <p>{{ $user->address }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-dark font-weight-medium pt-3 mb-2">Description</p>
                                                            <p class="text-justify">{{ $user->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @component('components.delete-modal', [
                                'id' => 'delete-user-modal-' . $user->id,
                                'title' => 'Supprimer ' . $user->format_full_name,
                                'message' => 'Vous ne pourrez plus consulter cet utilisateur, êtes vous sûr?',
                                'route' => route('admin.users.destroy', [$user])
                            ])
                            @endcomponent
                            <form id="{{ $user->id }}-grant-admin" action="{{ route('admin.users.grant.admin', [$user]) }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            <form id="{{ $user->id }}-grant-super-admin" action="{{ route('admin.users.grant.super.admin', [$user])  }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        @empty
                            <div class="text-center col-12">
                                <div class="alert alert-primary text-primary" role="alert">
                                    Pas d'utilisateurs disponible
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
