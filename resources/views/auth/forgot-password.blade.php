@extends('layouts.auth')

@section('title' , 'Mot de passe oublié')

@section('content')
<h2 class="ui header">
    <div class="content">Mot de passe oublié</div>
</h2>
<form action="{{ route('password.forgot.store') }}" method="POST" class="ui large form">
	@csrf
	<div class="ui satcked segment">
        <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
				<input type="mail" name="email" placeholder="Adresse email">
			</div>
		</div>
		<input type="submit" class="ui fluid large teal submit button" value="Envoyer email">
		<br>
        <a href="{{ route('home') }}" class="ui fluid large button">Annuler</a>
	</div>
</form>
@endsection