@extends('layouts.app', [
    'layout' => 'admin',
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
                            <label for="country_id">
                                Pays
                                @if ($errors->has('country_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('country_id') }}
                                    </span>
                                @endif
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-flag"></i>
                                    </span>
                                </div>
                                <select name="country_id" id="country_id" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ (old('country_id') ?? 36) == $country->id ? 'selected' : '' }}>
                                            {{ $country->fr_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
                            <label for="icon">
                                Icone
                                @if ($errors->has('icon'))
                                    <span class="text-danger">
                                        {{ $errors->first('icon') }}
                                    </span>
                                @endif
                            </label>
                            <ul class="list-unstyled list-inline">
                                @foreach(icons() as $icon)
                                    <li class="d-inline-block mr-3">
                                        <label class="control control-radio">
                                            <i class="{{ $icon }}"></i>
                                            <input type="radio" name="icon" value="{{ $icon }}"
                                                    {{ $icon === old('name') ? 'checked' : '' }}
                                            />
                                            <div class="control-indicator"></div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
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
