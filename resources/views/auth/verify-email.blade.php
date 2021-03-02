@extends('layouts.app')

@section('title', 'Verifier email')

@section('content')
<div class="ui main container">
    <div class="ui segment">
		<h2 class="ui header">
			<i class="envelope outline icon"></i>
		    <div class="content">Veuillez verifiez votre adresse email:</div>
		</h2>
		<div class="ui two column grid">
			<div class="one column centered row">
				<div class="column">
					<p>
						Merci pour votre insciption! Avant de commencer, pouvez-vous vérifiez votre adresse email en cliquant
						sur le lien que nous vous avons envoyé par email ?<br />
						Si vous ne recevez pas l'email, nous allons vous en envoyer un autre.
					</p>
				</div> 
			</div>
			@if (session('status') == 'verification-link-sent')
			<div class="ui divider"></div>
			<div class="one column row">
				<div class="column">
					<p>
						Un lien de verification a été envoyé à l'adresse email que vous avez renseigné pendant votre inscription.
					</p>
				</div> 
			</div>
			@endif
			<div class="row">
				<div class="column">
					<form method="POST" action="{{ route('verification.send') }}" class="ui center aligned container">
						@csrf
						<input type="button" class="ui primary button" value="Renvoyer l'email">
					</form>
				</div>
				<div class="column">
					<form method="GET" action="{{ route('auth.logout') }}" class="ui center aligned container">
						@csrf
						<input type="submit" class="ui button" value="Deconnexion">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection