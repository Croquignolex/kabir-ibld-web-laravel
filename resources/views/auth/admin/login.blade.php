@extends('layouts.auth', ['color' => 'bg-danger'])

@section('auth.master.title', page_title('Connexion'))
@section('auth.master.page', 'Connexion')

@section('auth.master.body')
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="row">
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
            <div class="col-md-12">
                <button type="submit" class="btn btn-lg btn-danger btn-block mb-4">Connexion</button>
                <p class="mb-2">
                    Mot de passe oublié? Veillez contacter le super administrateur
                </p>
            </div>
        </div>
    </form>
@endsection
