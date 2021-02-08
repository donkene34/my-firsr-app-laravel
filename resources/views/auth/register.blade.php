@extends('layouts.main')

@section('content')
<div class="container-login">
    <div class="container-form container-form-register">
        <div class="head-form">
            <div class="titre">s'enregistrer</div>
        </div>
        <div class="form">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input">
                    <label for="Nom">Nom</label><br>
                    <input id="name" type="text" class="input-text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input">
                    <label for="Nom d'utilisateur">{{ __("Nom d'utilisateur") }}</label>
                        <input id="username" type="text" class="input-text @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="input">
                    <label for="email">{{ __('Adresse email') }}</label>
                        <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="input">
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input">
                    <label for="password-confirm">{{ __('Confirmez le Mot De Passe') }}</label>
                    <input id="password-confirm" type="password" class="input-text" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="input">
                    <input class="btn-connexion" type="submit" value="connexion">
                </div>

                <div >
                    vous avez dejà de compte?
                    <a href="{{ route('login') }}" class="lien-register">connecter vous</a>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
