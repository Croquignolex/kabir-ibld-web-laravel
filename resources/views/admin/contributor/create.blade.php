@extends('layouts.app', [
    'layout' => 'admin',
    'breadcrumb_name' => 'Nouveau',
    'breadcrumb_icon' => 'mdi mdi-account-plus-outline',
    'breadcrumb_chain' => ['Intervenants', 'Nouveau']
])

@section('app.master.title', page_title('Nouvel intervenant'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Nouvel intervenant</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="{{ route('admin.contributors.store') }}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">
                                Nom
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-rename-box"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="name"
                                       name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">
                                Address
                                @if ($errors->has('address'))
                                    <span class="text-danger">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-map"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="address"
                                       name="address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email"
                                       name="email" value="{{ old('email') }}">
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
                                        <i class="mdi mdi-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="phone"
                                       name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="domain_id">
                                Domaine
                                @if ($errors->has('domain_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('domain_id') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-folder-multiple-outline"></i>
                                    </span>
                                </div>
                                <select name="domain_id" id="domain_id" class="form-control">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}"
                                                {{ old('domain_id') == $domain->id ? 'selected' : '' }}>
                                            {{ $domain->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file">
                                Photo
                                @if ($errors->has('file'))
                                    <span class="text-danger">
                                        {{ $errors->first('file') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-image"></i>
                                    </span>
                                </div>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <small class="text-danger">Il est conseiller de choisir une image carré pour un meilleur appreçus</small>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                Description
                                @if ($errors->has('description'))
                                    <span class="text-danger">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-format-align-justify"></i>
                                    </span>
                                </div>
                                <textarea name="description" id="description" rows="5"
                                          class="form-control"
                                >{{ old('description') }}</textarea>
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
