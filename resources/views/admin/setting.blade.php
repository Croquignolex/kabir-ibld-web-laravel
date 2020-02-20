@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Information du site',
    'breadcrumb_icon' => 'mdi mdi-information-outline',
    'breadcrumb_chain' => ['Outils', 'Information du site']
]))

@section('app.master.title', page_title('Information du site'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Information du site</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    @if(session()->has('popup.message'))
                        <div class="text-center">
                            <div class="alert alert-{{ session('popup.type') }} alert-dismissable text-danger" role="alert">
                                <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('popup.message') }}
                            </div>
                        </div>
                    @endif
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="town">
                                Localisation
                                @if ($errors->has('town'))
                                    <span class="text-danger">
                                        {{ $errors->first('town') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-map-marker-outline"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="town"
                                       name="town" value="{{ old('town') ?? $setting->town }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                Téléphone
                                @if ($errors->has('phone'))
                                    <span class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-deskphone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="phone"
                                       name="phone" value="{{ old('phone') ?? $setting->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enrégistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
