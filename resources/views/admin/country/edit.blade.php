@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Modifier',
    'breadcrumb_icon' => 'mdi mdi-flag',
    'breadcrumb_chain' => ['Outils', 'Pays', 'Modifier']
])

@section('app.master.title', page_title('Modifier ce pays'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Modifier le pays <strong>{{ $country->fr_name }}</strong></h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.countries.update', [$country]) }}" method="POST">
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
                                <input type="text" class="form-control" id="code" disabled value="{{ $country->code }}">
                            </div>
                        </div>
                        @include('partials.form.input', [
                           'name' => ' Abréviation à 2 caratères',
                           'id' => 'alpha_2',
                           'icon' => 'mdi mdi-signal-2g',
                           'type' => 'text',
                           'value' => old('alpha_2') ?? $country->alpha_2,
                       ])
                        @include('partials.form.input', [
                           'name' => ' Abréviation à 3 caratères',
                           'id' => 'alpha_3',
                           'icon' => 'mdi mdi-signal-3g',
                           'type' => 'text',
                           'value' => old('alpha_3') ?? $country->alpha_3,
                       ])
                        @include('partials.form.input', [
                           'name' => 'Nom en anglais',
                           'id' => 'en_name',
                           'icon' => 'mdi mdi-flag-checkered',
                           'type' => 'text',
                           'value' => old('en_name') ?? $country->en_name,
                       ])
                        @include('partials.form.input', [
                           'name' => 'Nom en français',
                           'id' => 'fr_name',
                           'icon' => 'mdi mdi-flag-outline',
                           'type' => 'text',
                           'value' => old('fr_name') ?? $country->fr_name,
                       ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
