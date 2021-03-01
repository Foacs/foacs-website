@extends('layouts.auth')

@section('title' , 'Changer mot de passe')

@section('content')
<h2 class="ui header">
	<div class="content">
		{{ $user->first_name }} {{ $user->last_name }} ({{ $user->name }})
		<div class="sub header">Changer mot de passe</div>
	</div>
</h2>
<form action="{{ route('password.change.store', $user) }}" method="POST" class="ui large form">
	@csrf
	<div class="ui satcked segment">
	    <div class="field @error('current_password') error @enderror">
	        <div class="ui left icon input">
	            <i class="lock icon"></i>
				<input type="password" name="current_password" placeholder="Mot de passe actuel">
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
		<input type="submit" class="ui fluid large teal submit button" value="Valider">
		<br>
        <a href="{{ route('profile.show', $user) }}" class="ui fluid large button">Annuler</a>
	</div>
</form>
@endsection
