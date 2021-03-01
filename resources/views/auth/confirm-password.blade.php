@extends('layouts.auth')

@section('title' , 'Confirmer mot de passe')

@section('content')
<h2 class="ui header">
    <div class="content">
        Veuillez confirmer votre mot de passe.
        <div class="sub header">Ceci est une zone sécurisé de l'application.</div>
    </div>
</h2>
<form method="POST" action="{{ route('password.confirm') }}" class="ui large form">
    @csrf
    <div class="ui satcked segment">
        
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
        
        <input type="submit" class="ui fluid large teal submit button" value="Confirmer">
        <br>
        <a href="{{ route('home') }}" class="ui fluid large button">Annuler</a>
    </div>
</form>
@endsection