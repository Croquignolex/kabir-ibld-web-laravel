@extends('layouts.app', [
    'breadcrumb_name' => 'Nouveau',
    'breadcrumb_icon' => 'mdi mdi-folder-plus-outline',
    'breadcrumb_chain' => ['Domaines', 'Nouveau']
])

@section('app.master.title', page_title('Nouveau domaine'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau domaine</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.domains.store') }}" method="POST">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' => old('name'),
                        ])
                        @include('partials.form.select', [
                            'name' => 'Pays',
                            'id' => 'country_id',
                            'icon' => 'mdi mdi-flag',
                            'value' => old('country_id') ?? 36,
                            'options' => $countries,
                            'country_page' => true,
                        ])
                        @include('partials.form.textarea', [
                            'name' => 'Description',
                            'id' => 'description',
                            'icon' => 'mdi mdi-format-align-justify',
                            'value' => old('description'),
                        ])
                        @include('partials.form.radio', [
                            'name' => 'Icone',
                            'id' => 'icon',
                            'value' => old('icon')
                        ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
