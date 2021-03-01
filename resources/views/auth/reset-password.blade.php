@extends('layouts.auth')

@section('title' , 'Reinitiliser mot de passe')

@section('content')
<h2 class="ui header">
    <div class="content">Reinitialiser votre mot de passe</div>
</h2>
<form action="{{ route('password.reset.store') }}" method="POST" class="ui large form">
	@csrf
	<input type="hidden" name="token" value="{{ $token }}"><div class="ui satcked segment">
	<div class="ui satcked segment">
	    <div class="field">
	        <div class="ui left icon input">
	            <i class="user icon"></i>
				<input type="mail" name="email" value="{{ old('email') }}" placeholder="Address email">
			</div>
		</div>
		<div class="field">
	        <div class="ui left icon input">
	            <i class="lock icon"></i>
				<input type="password" name="password" placeholder="Mot de passe">
			</div>
		</div>
		<div class="field">
	        <div class="ui left icon input">
	            <i class="lock icon"></i>
				<input type="password" name="password_confirmation" placeholder="Confirmer mot de passe">
			</div>
		</div>
		<input type="submit" class="ui fluid large teal submit button" value="Valider">
		<br>
        <a href="{{ route('home') }}" class="ui fluid large button">Annuler</a>
	</div>
</form>
@endsection
