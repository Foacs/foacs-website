@extends('layouts.auth')

@section('title' , 'Connection')

@section('content')
<h2 class="ui header">
    <div class="content">Connecter vous à votre compte</div>
</h2>
<form method="POST" action="{{ route('auth.authenticate') }}" class="ui large form">
    @csrf
    <div class="ui satcked segment">
        <a href="{{ route('auth.github.login') }}">
            <div class="ui black button">
                <i class="github icon"></i>
                Se connecter avec github
            </div>
        </a>
        <div class="ui horizontal divider">
            OU
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="mail" name="email" placeholder="Adresse e-mail">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="remember" name="remember">
                <label for="remember">Se souvenir de moi ?</label>
            </div>
        </div>
        <input type="submit" class="ui fluid large teal submit button" value="Connection">
        <br>
        <a href="{{ route('home') }}" class="ui fluid large button">Annuler</a>
    </div>
    @error('email')
        <div>{{ $message }}</div>
    @enderror
</form>
<div class="ui message">
    Nouveau ? <a href="{{ route('auth.register') }}">S'inscrire</a><br />
    <a href="{{ route('password.request') }}">Mot de passe oublié</a>
</div>
@endsection