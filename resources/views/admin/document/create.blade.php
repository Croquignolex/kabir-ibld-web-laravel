@extends('layouts.app', [
    'breadcrumb_name' => 'Documents',
    'breadcrumb_icon' => 'mdi mdi mdi-file-find-outline',
    'breadcrumb_chain' => ['Documents', 'Nouveau']
])

@section('app.master.title', page_title('Nouveau document'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau document</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Code',
                            'id' => 'code',
                            'icon' => 'mdi mdi-two-factor-authentication',
                            'type' => 'text',
                            'value' => 'FGD2020' . mb_strtoupper(Str::random(8)),
                            'attribute' => 'readonly',
                        ])
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' => old('name'),
                        ])
                        @include('partials.form.select', [
                            'name' => 'Domaine',
                            'id' => 'domain_id',
                            'icon' => 'mdi mdi-folder-multiple-outline',
                            'value' => old('domain_id'),
                            'options' => $domains,
                        ])
                        @include('partials.form.file', [
                            'name' => 'Photo',
                            'icon' => 'mdi mdi-image',
                            'tip' => 'Il est conseiller de choisir un ficher de moins de 10Mo un meilleur traitement',
                        ])
                        @include('partials.form.textarea', [
                            'name' => 'Description',
                            'id' => 'description',
                            'icon' => 'mdi mdi-format-align-justify',
                            'value' => old('description'),
                        ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
