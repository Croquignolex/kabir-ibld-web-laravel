@extends('layouts.auth')

@section('auth.master.title', page_title('Récupérer le mot de passe'))
@section('auth.master.page', 'Récupérer le mot de passe')

@section('auth.master.body')
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-12">
                <input type="email" class="form-control input-lg" id="email"
                       placeholder="Email" value="{{ old('email') }}" />
                <label for="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Récupérer</button>
                <p>
                    Vous avez déjà un compte?
                    <a class="text-blue" href="{{ route('login') }}">Connectez-vous</a>
                </p>
                {{--<p>
                    Pas encore de compte?
                    <a class="text-blue" href="{{ route('register') }}">Inscrivez-vous</a>
                </p>--}}
            </div>
        </div>
    </form>
@endsection
