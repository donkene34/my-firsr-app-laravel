    @extends('layouts.main')

    @section('content')
    <div class="container-login">
        <div class="container-form">
            <div class="head-form">
                <div class="titre">Se connecter</div>
            </div>
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input">
                        <label for="email">email</label><br>
                        <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="input">
                        <label for="mdp">Mot De Passe</label><br>
                        <input id="password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <div class="input">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember me">se souvenir de moi</label>
                    </div>
                   <div class="input">
                    <input class="btn-connexion" type="submit" value="connexion"><br>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Mot de Passe oublié?') }}
                        </a>
                    @endif
                   </div>
                   <div >
                    vous n'avez pas de compte?
                    <a href="{{ route('register') }}" class="lien-register">enregistrer vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection


