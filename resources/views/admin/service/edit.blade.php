@extends('layouts.app', [
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-database-search',
    'breadcrumb_chain' => ['Services', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce service'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier le service <strong>{{ $service->name }}</strong></h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.services.update', [$service]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' =>  old('name') ?? $service->name,
                        ])
                        @include('partials.form.textarea', [
                            'name' => 'Description',
                            'id' => 'description',
                            'icon' => 'mdi mdi-format-align-justify',
                            'value' => old('description') ?? $service->description,
                        ])
                        @include('partials.form.radio', [
                           'name' => 'Icone',
                           'id' => 'icon',
                           'value' => old('icon') ?? $service->icon
                       ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
