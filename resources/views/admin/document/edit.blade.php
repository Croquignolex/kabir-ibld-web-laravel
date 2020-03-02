@extends('layouts.app', [
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-folder-search-outline',
    'breadcrumb_chain' => ['Document', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce document'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier ce document</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.documents.update', [$document]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="code">
                                Code
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-two-factor-authentication"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="code" disabled value="{{ $document->code }}">
                            </div>
                        </div>
                        @include('partials.form.input', [
                            'name' => 'Nom',
                            'id' => 'name',
                            'icon' => 'mdi mdi-rename-box',
                            'type' => 'text',
                            'value' =>  old('name') ?? $document->name,
                        ])
                        @include('partials.form.select', [
                            'name' => 'Domaine',
                            'id' => 'domain_id',
                            'icon' => 'mdi mdi-folder-multiple-outline',
                            'value' => old('domain_id') ?? $document->domain->id,
                            'options' => $domains,
                        ])
                        @include('partials.form.textarea', [
                           'name' => 'Description',
                           'id' => 'description',
                           'icon' => 'mdi mdi-format-align-justify',
                           'value' => old('description') ?? $document->description,
                       ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
