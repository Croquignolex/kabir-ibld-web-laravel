@extends('layouts.auth')

@section('auth.master.title', page_title('Inscription'))
@section('auth.master.page', 'Inscription')

@section('auth.master.body')
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control input-lg" id="first_name"
                       placeholder="Prénom" value="{{ old('first_name') }}" name="first_name" />
                <label for="first_name">
                    @if ($errors->has('first_name'))
                        <span class="text-danger">
                            {{ $errors->first('first_name') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="form-group col-md-12">
                <input type="text" class="form-control input-lg" id="last_name"
                       placeholder="Nom" value="{{ old('last_name') }}" name="last_name"/>
                <label for="last_name">
                    @if ($errors->has('last_name'))
                        <span class="text-danger">
                            {{ $errors->first('last_name') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="form-group col-md-12">
                <input type="email" class="form-control input-lg" id="email"
                       placeholder="Email" value="{{ old('email') }}" name="email"/>
                <label for="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="form-group col-md-12">
                <input type="password" class="form-control input-lg" id="password"
                       placeholder="Mot de passe" value="{{ old('password') }}" name="password"/>
                <label for="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="form-group col-md-12">
                <input type="password" class="form-control input-lg" id="password_confirmation" name="password_confirmation"
                       placeholder="Confirmer le mot de passe" value="{{ old('password_confirmation') }}" />
                <label for="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Inscription</button>
                <p>
                    Vous avez déjà un compte?
                    <a class="text-blue" href="{{ route('login') }}">Connectez-vous</a>
                </p>
            </div>
        </div>
    </form>
@endsection
