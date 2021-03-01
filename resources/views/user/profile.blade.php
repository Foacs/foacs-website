@extends('layouts.app')

@section('title' , $user->name)

@section('content')
<div class="ui main container">
	<div class="ui segments">
		<div class="ui segment">
			<h1 class="ui header">Profil</h1>
			@includeWhen($mode == 'show', 'user.profile_show')
			@includeWhen($mode == 'edit', 'user.profile_edit')
		</div>
		<div class="ui segment">
			<h2 class="ui header">Projets</h2>
			<div class="ui segment">
				<div class="ui divided list">
					@foreach ($user->projects as $project)
					<div class="item">
						<a href="{{ route('projects.show', $project) }}" class="header">{{ $project->name }}</a>
						<div class="description">
							{{ $project->pivot->role_description }}
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@can('manageToken', $user)
		<div class="ui segment">
			<h1 class="ui header">Tokens d'API</h1>
				<div class="ui segment">
				<form action="{{ route('token.create') }}" method="POST" class="ui center aligned form">
					@csrf
					<div class="three fields">
						<div class="required field @error('token_name') error @enderror">
							<label>Nom du token</label>
							<input type="text" name="token_name" placeholder="Nom du token">
						</div>
						<div class="required @error('ability') error @enderror field">
							<label>Type de token</label>
							<select name="ability" id="ability" class="ui search dropdown">
								<option value="" disabled selected>Type</option>
								<option value="contact:issue">(API) Mail d'erreur</option>
							</select>
						</div>
					</div>
					@if (session()->has('token'))
					<div class="field">
						<label>Token <i>(cette valeur ne sera plus visible)</i>:</label>
						<input id="token" type="text" readonly value="{{ session()->get('token') }}" >
					</div>
					@endif
					<input type="submit" class="ui primary button" value="Créer nouveau token">
					<div class="ui divider"></div>
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
		</div>
		@endcan
	</div>
</div>
<script>
	function confirmDelete() {
		return confirm("Voulez-vous vraiment supprimer ce token (irréversible),\r\ntoutes les applications l'utilisant perdront leurs droits ?")
	}

	function editProfile() {
		$('.field.hiddable > input').type = 'text';
	}
</script>
@endsection