@extends('layouts.app', [
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-account-search-outline',
    'breadcrumb_chain' => ['Domaines', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce contributeur'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier le contributeur <strong>{{ $contributor->name }}</strong></h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.contributors.update', [$contributor]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' =>  old('name') ?? $contributor->name,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Address',
                            'id' => 'address',
                            'icon' => 'mdi mdi-map',
                            'type' => 'text',
                            'value' => old('address') ?? $contributor->address,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Email',
                            'id' => 'email',
                            'icon' => 'mdi mdi-email',
                            'type' => 'email',
                            'value' => old('email') ?? $contributor->email,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Téléphone',
                            'id' => 'phone',
                            'icon' => 'mdi mdi-phone',
                            'type' => 'text',
                            'value' => old('phone') ?? $contributor->phone,
                        ])
                        @include('partials.form.select', [
                            'name' => 'Domaine',
                            'id' => 'domain_id',
                            'icon' => 'mdi mdi-folder-multiple-outline',
                            'value' => old('domain_id') ?? $contributor->domain->id,
                            'options' => $domains,
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
                            'value' => old('description') ?? $contributor->description,
                        ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
