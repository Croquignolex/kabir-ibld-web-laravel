@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Nouveau',
    'breadcrumb_icon' => 'mdi mdi-account-multiple-plus-outline',
    'breadcrumb_chain' => ['Utilisateurs', 'Nouveau']
])

@section('app.master.title', page_title('Nouvel utilisateur'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouvel utilisateur</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Prénom',
                            'id' => 'first_name',
                            'icon' => 'mdi mdi-account-question',
                            'type' => 'text',
                            'value' =>  old('first_name')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'last_name',
                            'icon' => 'mdi mdi-account-question-outline',
                            'type' => 'text',
                            'value' =>  old('last_name')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Email',
                            'id' => 'email',
                            'icon' => 'mdi mdi-email',
                            'type' => 'email',
                            'value' => old('email'),
                        ])
                        @include('partials.form.input', [
                            'name' => 'Téléphone',
                            'id' => 'phone',
                            'icon' => 'mdi mdi-deskphone',
                            'type' => 'text',
                            'value' =>  old('phone')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Code postal',
                            'id' => 'post_code',
                            'icon' => 'mdi mdi-inbox',
                            'type' => 'text',
                            'value' =>  old('post_code')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Ville',
                            'id' => 'city',
                            'icon' => 'mdi mdi-city-variant-outline',
                            'type' => 'text',
                            'value' =>  old('city')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Pays',
                            'id' => 'country',
                            'icon' => 'mdi mdi-flag',
                            'type' => 'text',
                            'value' =>  old('country')
                        ])
                        @include('partials.form.input', [
                            'name' => 'Profession',
                            'id' => 'profession',
                            'icon' => 'mdi mdi-worker',
                            'type' => 'text',
                            'value' =>  old('profession')
                        ])
                        @include('partials.form.input', [
                           'name' => 'Adresse',
                           'id' => 'address',
                           'icon' => 'mdi mdi-home-account',
                           'type' => 'text',
                           'value' =>  old('address')
                       ])
                        @include('partials.form.file', [
                            'name' => 'Photo',
                            'icon' => 'mdi mdi-image',
                            'tip' => 'Il est conseiller de choisir une image carré pour un meilleur appreçus',
                        ])
                        @include('partials.form.textarea', [
                           'name' => 'Description',
                           'id' => 'description',
                           'icon' => 'mdi mdi-format-align-justify',
                           'value' => old('description')
                       ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
