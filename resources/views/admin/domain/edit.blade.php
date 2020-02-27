@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Domains', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce domaine'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier le domaine <strong>{{ $domain->name }}</strong></h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.domains.update', [$domain]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' =>  old('name') ?? $domain->name,
                        ])
                        @include('partials.form.select', [
                           'name' => 'Pays',
                           'id' => 'country_id',
                           'icon' => 'mdi mdi-folder-multiple-outline',
                           'value' => old('country_id') ?? $domain->country->id,
                           'options' => $countries,
                           'country_page' => true,
                       ])
                        @include('partials.form.textarea', [
                            'name' => 'Description',
                            'id' => 'description',
                            'icon' => 'mdi mdi-format-align-justify',
                            'value' => old('description') ?? $domain->description,
                        ])
                        @include('partials.form.radio', [
                            'name' => 'Icone',
                            'id' => 'icon',
                            'value' => old('icon') ?? $domain->icon
                        ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
