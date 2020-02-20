@extends('layouts.app', [
    'layout' => 'admin',
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
                        <div class="form-group">
                            <label for="code">
                                Code
                                @if ($errors->has('code'))
                                    <span class="text-danger">
                                        {{ $errors->first('code') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-two-factor-authentication"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="code"
                                       name="code" value="{{ old('code') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alpha_2">
                                Abréviation à 2 caratères
                                @if ($errors->has('alpha_2'))
                                    <span class="text-danger">
                                        {{ $errors->first('alpha_2') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-signal-2g"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="alpha_2"
                                       name="alpha_2" value="{{ old('alpha_2') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alpha_3">
                                Abréviation à 3 caratères
                                @if ($errors->has('alpha_3'))
                                    <span class="text-danger">
                                        {{ $errors->first('alpha_3') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-signal-3g"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="alpha_3"
                                       name="alpha_3" value="{{ old('alpha_3') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="en_name">
                                Nom en anglais
                                @if ($errors->has('en_name'))
                                    <span class="text-danger">
                                        {{ $errors->first('en_name') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-flag-checkered"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="en_name"
                                       name="en_name" value="{{ old('en_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fr_name">
                                Nom en français
                                @if ($errors->has('fr_name'))
                                    <span class="text-danger">
                                        {{ $errors->first('fr_name') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-flag-outline"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="fr_name"
                                       name="fr_name" value="{{ old('fr_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-check"></i>
                                Enrégistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
