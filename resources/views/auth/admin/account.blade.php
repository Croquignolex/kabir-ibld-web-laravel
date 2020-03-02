@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

@extends('layouts.app', [
    'breadcrumb_name' => 'Mon profil',
    'breadcrumb_icon' => 'mdi mdi-account',
    'breadcrumb_chain' => ['Profil']
])

@section('app.master.title', page_title('Mon profil'))

@section('app.master.body')
    <div class="bg-white border rounded">
        <div class="row no-gutters">
            <div class="col-lg-6 col-xl-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-4">
                    <div class="card text-center widget-profile px-0 border-0">
                        <div class="card-img mx-auto rounded-circle">
                            <img src="{{ $user->avatar_src }}" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="py-2 text-dark">{{ $user->format_full_name }}</h4>
                            <p>{{ $user->email }}</p>
                            <span class="badge badge-primary mt-2">{{ $user->role_name }}</span>
                        </div>
                    </div>
                    <hr class="w-100">
                    <div class="contact-info pt-4">
                        <h5 class="text-dark mb-1">Information</h5>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Pénom</p>
                        <p>{{ $user->format_first_name }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Nom</p>
                        <p>{{ $user->format_last_name }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Email</p>
                        <p>{{ $user->email }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Téléphone</p>
                        <p>{{ $user->phone }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Code postal</p>
                        <p>{{ $user->post_code }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Ville</p>
                        <p>{{ $user->city }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Pays</p>
                        <p>{{ $user->country }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Profession</p>
                        <p>{{ $user->profession }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Adresse</p>
                        <p>{{ $user->address }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Description</p>
                        <p class="text-justify">{{ $user->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-8">
                <div class="profile-content-right py-5">
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar" aria-selected="false">Photo de profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Mot de passe</a>
                        </li>
                    </ul>
                    <!-- Information -->
                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="mt-4">
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    @include('partials.form.input', [
                                        'name' => 'Prénom',
                                        'id' => 'first_name',
                                        'icon' => 'mdi mdi-account-question',
                                        'type' => 'text',
                                        'value' =>  old('first_name') ?? $user->first_name,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Nom',
                                        'id' => 'last_name',
                                        'icon' => 'mdi mdi-account-question-outline',
                                        'type' => 'text',
                                        'value' =>  old('last_name') ?? $user->last_name,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Téléphone',
                                        'id' => 'phone',
                                        'icon' => 'mdi mdi-deskphone',
                                        'type' => 'text',
                                        'value' =>  old('phone') ?? $user->phone,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Code postal',
                                        'id' => 'post_code',
                                        'icon' => 'mdi mdi-inbox',
                                        'type' => 'text',
                                        'value' =>  old('post_code') ?? $user->post_code,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Ville',
                                        'id' => 'city',
                                        'icon' => 'mdi mdi-city-variant-outline',
                                        'type' => 'text',
                                        'value' =>  old('city') ?? $user->city,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Pays',
                                        'id' => 'country',
                                        'icon' => 'mdi mdi-flag',
                                        'type' => 'text',
                                        'value' =>  old('country') ?? $user->country,
                                    ])
                                    @include('partials.form.input', [
                                        'name' => 'Profession',
                                        'id' => 'profession',
                                        'icon' => 'mdi mdi-worker',
                                        'type' => 'text',
                                        'value' =>  old('profession') ?? $user->profession,
                                    ])
                                    @include('partials.form.input', [
                                       'name' => 'Adresse',
                                       'id' => 'address',
                                       'icon' => 'mdi mdi-home-account',
                                       'type' => 'text',
                                       'value' =>  old('address') ?? $user->address,
                                   ])
                                    @include('partials.form.textarea', [
                                       'name' => 'Description',
                                       'id' => 'description',
                                       'icon' => 'mdi mdi-format-align-justify',
                                       'value' => old('description') ?? $user->description,
                                   ])
                                    @include('partials.form.submit')
                                </form>
                            </div>
                        </div>
                        <!-- Avatar -->
                        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                            <div class="mt-4">
                                <form method="POST" action="{{ route('admin.account.avatar') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    @include('partials.form.file', [
                                        'name' => 'Photo',
                                        'icon' => 'mdi mdi-image',
                                        'tip' => 'Il est conseiller de choisir une image carré pour un meilleur appreçus',
                                    ])
                                    @include('partials.form.submit')
                                </form>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <div class="mt-4">
                                <form method="POST" action="{{ route('admin.account.password') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    @include('partials.form.input', [
                                        'name' => 'Ancien mot de passe',
                                        'id' => 'old_password',
                                        'icon' => 'mdi mdi-textbox-password',
                                        'type' => 'password',
                                        'value' =>  old('old_password'),
                                    ])
                                    @include('partials.form.input', [
                                       'name' => 'Nouveau mot de passe',
                                       'id' => 'password',
                                       'icon' => 'mdi mdi-textbox',
                                       'type' => 'password',
                                       'value' =>  old('password'),
                                    ])
                                    @include('partials.form.input', [
                                      'name' => 'Confrimer le mot de passe',
                                      'id' => 'password_confirmation',
                                      'icon' => 'mdi mdi-textbox',
                                      'type' => 'password',
                                      'value' => old('password_confirmation'),
                                   ])
                                    @include('partials.form.submit')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')
