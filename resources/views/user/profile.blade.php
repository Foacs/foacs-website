@extends('layouts.app')

@section('title' , $user->name)

@section('content')
<div class="ui main container">
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
				@if ($user->email === Auth::user()->email)
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
@endsection