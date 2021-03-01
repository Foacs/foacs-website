@extends('layouts.app')

@section('title' , 'Utilisateurs')

@section('content')
<div class="ui main container">
    <div class="ui padded segment">
		<h1 class="ui header">Les membres: </h1>
		<div class="ui divided list">
			@forelse($users as $user)
			<div class="item">
				<img src="{{ $user->avatar() }} " alt="Avatar" class="ui avatar image">
				<div class="content">
					<a href="{{ url('/users/'.$user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
					<div class="description">
						@foreach ($user->roles as $role)
						{{ $role->name }}
						@endforeach
					</div>
				</div>
				@can('delete', $user)
				<div class="right floated content">
					<a href="{{ route('profile.delete', $user) }}" class="ui negative mini icon button"
						onclick="return confirmDelete()"><i class="delete icon"></i></a>
				</div>
				@endcan
			</div>
			@empty
			<div class="item">Aucun utilisateur</div>
			@endforelse
		</div>
	</div>
</div>
<script>
	function confirmDelete() {
		return confirm("Voulez-vous vraiment supprimer ce profile ?")
	}
</script>
@endsection