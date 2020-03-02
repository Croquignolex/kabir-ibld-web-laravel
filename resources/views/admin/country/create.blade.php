@extends('layouts.app', [
    'breadcrumb_name' => 'Nouveau',
    'breadcrumb_icon' => 'mdi mdi-flag',
    'breadcrumb_chain' => ['Outils', 'Pays', 'Nouveau']
])

@section('app.master.title', page_title('Nouveau pays'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouveau pays</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.countries.store') }}" method="POST">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Code',
                            'id' => 'code',
                            'icon' => 'mdi mdi-two-factor-authentication',
                            'type' => 'text',
                            'value' => old('code'),
                        ])
                        @include('partials.form.input', [
                           'name' => ' Abréviation à 2 caratères',
                           'id' => 'alpha_2',
                           'icon' => 'mdi mdi-signal-2g',
                           'type' => 'text',
                           'value' => old('alpha_2'),
                       ])
                        @include('partials.form.input', [
                           'name' => ' Abréviation à 3 caratères',
                           'id' => 'alpha_3',
                           'icon' => 'mdi mdi-signal-3g',
                           'type' => 'text',
                           'value' => old('alpha_3'),
                       ])
                        @include('partials.form.input', [
                           'name' => 'Nom en anglais',
                           'id' => 'en_name',
                           'icon' => 'mdi mdi-flag-checkered',
                           'type' => 'text',
                           'value' => old('en_name'),
                       ])
                        @include('partials.form.input', [
                           'name' => 'Nom en français',
                           'id' => 'fr_name',
                           'icon' => 'mdi mdi-flag-outline',
                           'type' => 'text',
                           'value' => old('fr_name'),
                       ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
