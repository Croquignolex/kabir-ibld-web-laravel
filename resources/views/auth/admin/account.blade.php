@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

@extends('layouts.app', [
    'layout' => 'admin',
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
                        <p>{{ $user->description }}</p>
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
                            <div class="mt-5">
                                <form method="POST" action="">
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="phone">
                                            Prénom
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </span>
                                            @endif
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-phone"></i>
                                    </span>
                                            </div>
                                            <input type="text" class="form-control" id="phone"
                                                   name="phone" value="{{ old('phone') ?? $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="first_name">Prénom</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="last_name">Nom</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone">Téléphone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="post_code">Code postal</label>
                                        <input type="text" class="form-control" id="post_code" name="post_code" value="{{ $user->post_code }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city">Ville</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="country">Pays</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="profession">Profession</label>
                                        <input type="text" class="form-control" id="profession" name="profession" value="{{ $user->profession }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="address">Adresse</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="description">Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-format-align-justify"></i>
                                            </span>
                                            </div>
                                            <textarea name="description" id="description" rows="5"
                                                      class="form-control"
                                            >{{ old('description') ?? $user->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="mdi mdi-check"></i>
                                            Enrégistrer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Avatar -->
                        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">

                        </div>
                        <!-- Password -->
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.table-page-push')