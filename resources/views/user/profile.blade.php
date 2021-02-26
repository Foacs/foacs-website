@extends('layouts.app')

@section('title' , $user->name)

@section('content')
<div class="ui main container">
	<div class="ui segments">
		<div class="ui segment">
			<h1 class="ui header">Profile</h1>
			<div class="ui horizontal segments">
				<div class="ui padded segment">
					<h2 class="ui header">
						<img class="ui rounded image" src="{{ $grav_url }}" alt="Gravatar">
						<div class="content">
							Prénom NOM
							<div class="sub header">{{ $user->name }}</div>
						</div>
					</h2>
					<p>Bio</p>
					@auth
						@if ($is_connected)
							<a href="{{ route('profile.edit', $user->id) }}" class="ui button">Editer le profile</a>
						@endif
					@endauth
				</div>
				<div class="ui segment">
					<h2 class="ui header">Projets</h2>
					<div class="ui divided list">
						<div class="item">
							<a href="{{ route('projects.show', 1) }}" class="header">RIBZ</a>
							<div class="description">
								Structure de l'application et frontend.
							</div>
						</div>
						<div class="item">
							<a href="{{ route('projects.show', 2) }}" class="header">Commons</a>
							<div class="description">
								Contributions diverses.
							</div>
						</div>
						<div class="item">
							<a href="{{ route('projects.show', 3) }}" class="header">PPHI</a>
							<div class="description">
								Architecture de l'application
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@auth
			@if ($is_connected)
			<div class="ui segment">
				<h1 class="ui header">Tokens d'API</h1>
				<form action="{{ route('token.create') }}" method="POST" class="ui center aligned form">
					@csrf
					<div class="inline fields">
						<div class=" field">
							<input type="text" name="token_name" placeholder="Nom du token">
						</div>
						<div class="field">
							<select name="ability" id="ability" class="ui search dropdown">
								<option value="" disabled selected>Type</option>
								<option value="contact:issue">(API) Mail d'erreur</option>
							</select>
						</div>
						<input type="submit" class="ui primary button" value="Créer nouveau token">
					</div>
					@if (session()->has('token'))
					<div class="field">
						<label>Token <i>(cette valeur ne sera plus visible)</i>:</label>
						<input id="token" type="text" readonly value="{{ session()->get('token') }}" >
					</div>
					@endif
				</form>
				<table class="ui celled table">
					<thead>
						<tr>
							<th class="six wide">Nom</th>
							<th class="six wide" >Abilité(s)</th>
							<th class="four wide">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($connected_user->tokens as $token)
					<tr>
						<td>{{ $token->name }}</td>
						<td>
							<div class="ui list">
								@foreach ($token->abilities as $ability)
									<div class="item">{{ $ability }}</div>
								@endforeach
							</div>
						</td>
						<td>
							<form action="{{ route('token.delete') }}" method="POST" style="display: inline-block">
								@csrf
								<input type="hidden" name="token_id" value="{{ $token->id }}">
								<input type="submit" class="ui negative mini button" onclick="return confirmDelete()" value="Supprimer">
							</form>
						</td>
					</tr>
					@empty
						<tr>
							<td class="center aligned" colspan="3">Aucun token</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
			@endif
		@endauth
	</div>
</div>
<script>
	function confirmDelete() {
		return confirm("Voulez-vous vraiment supprimer ce token (irréversible),\r\nToutes les applications l'utilisant perdront leurs droits ?")
	}
</script>
@endsection