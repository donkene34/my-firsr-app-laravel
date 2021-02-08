@extends('layouts.main')

@section('content')
<div class="container-login">
    <div class="container-form container-form-password">
        <div class="head-form">
            <div class="titre">confirmer le mot de passe</div>
        </div>
        <div class="form">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <h5>S'il vous plait confirmez le mot de passe avant de continuer</h5>
                        <div class="input">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <input class="btn-connexion confirm-password" type="submit" value="confirmez"><br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
