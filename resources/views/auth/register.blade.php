@extends('layouts.auth')

@section('title' , 'S\'inscrire')

@section('content')
<h2 class="ui header">
    <div class="content">Inscrivez-vous</div>
</h2>
<form method="POST" action="{{ route('auth.create') }}" class="ui large form @if ($errors->any()) error @endif">
    @csrf
    <div class="ui satcked segment">
        <div class="field @error('name') error @enderror">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur">
            </div>
        </div>
        <div class="field @error('email') error @enderror">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="mail" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail">
            </div>
        </div>
        <div class="field @error('password') error @enderror">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="field @error('password_confirmation') error @enderror">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe">
            </div>
        </div>
        <div class="field @error('EULA_agree') error @enderror">
            <div class="ui checkbox">
                <input type="checkbox" id="EULA_agree" name="EULA_agree">
                <label for="EULA_agree" style="cursor: pointer;">Je suis d'accord avec les conditions générales d'utilisation.</label>
            </div>
        </div>
        <input type="submit" class="ui fluid large teal submit button" value="S'inscrire">
        <br>
        <a href="{{ route('home') }}" class="ui fluid large button">Annuler</a>
    </div>
</form>
<div class="ui message">
    Déjà membre ? <a href="{{ route('auth.login') }}">Se connecter</a>
</div>
@endsection