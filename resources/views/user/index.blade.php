@extends('layouts.app')

@section('title' , 'Utilisateurs')

@section('content')
<div class="ui main container">
    <div class="ui segment">
		<h3>Utilisateurs: </h3>
		<ul>
			@forelse($users as $user)
			<li><a href="{{ url('/users/'.$user->id) }}">{{ $user->name }}</a></li>
			@empty
			<p>Aucun utilisateur</p>
			@endforelse
		</ul>
	</div>
</div>
@endsection