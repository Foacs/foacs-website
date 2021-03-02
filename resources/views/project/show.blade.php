@extends('layouts.app')

@section('title' , 'Projet '.$current->name)

@section('description')
	{{ $current->description }}
@endsection

@section('content')
<div class="ui main container">
    <div class="ui segment">
		<div class="ui grid">
			<div class="one column row">
				<div class="column">
					<div class="ui center aligned container">
						<h1 class="ui header">Les projets</h1>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="four wide column">
					<div class="ui vertical fluid tabular menu">
						@forelse($projects as $project)
						<a href="{{ route('projects.show', $project) }}" 
								class="{{ $prj==$project->name?'active':'' }} item">
							@if ($project->trashed())
							<strike>{{ $project->name }}</strike>
							@else
							{{ $project->name }}
							@endif
						</a>
						@empty
							<p>Aucun projet</p>
						@endforelse
						@can('create', App\Models\Project::class)
						<div class="ui divider"></div>
						<a href="{{ route('projects.create') }}" class="item">Nouveau projet</a>
						@endcan
					</div>
				</div>
				<div class="twelve wide streched column">
					<div class="ui satcked segment">
						@if(isset($current))
							<h2 class="ui header">
								<div class="centent">
									{{ $current->name }}
									@if($current->trashed()) <div class="sub header">Supprimé (non visible publiquement)</div>@endif
								</div>
							</h2>
							<p>
								{{ $current->description }}
							</p>
							@if ($current->trashed())
								@can('restore', $current)
								<a href="{{ route('projects.restore',$current) }}" class="ui primary button">Restaurer</a>
								@endcan
							@else
								@can('update', $current)
								<a href="{{ route('projects.edit', $current) }}" class="ui small icon button"><i class="edit icon"></i></a>
								@endcan
								@can('delete', $current)
								<a href="{{ route('projects.delete', $current) }}" class="ui small icon button"><i class="trash icon"></i></a>
								@endcan
							@endif
							<div class="ui divider"></div>
							<h3>Contributeurs</h3>
							<div class="ui list">
								@forelse ($current->users as $user)
									<div class="item">
										<div class="content">
											@can('removeContributor', $current)
											<a href="{{ route('projects.remove.contributor',['project' => $current, 'user' => $user]) }}" class="ui negative mini icon button"><i class="delete icon"></i></a>	
											@endcan
											<a href="{{ route('profile.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }} ({{ $user->name }})</a>: {{ $user->pivot->role_description }}
										</div>
									</div>
								@empty
									<div class="item"><i>Aucun contributeur renseigné</i></div>
								@endforelse
								@can('addContributor', $current)
								<div class="ui divider"></div>
								<div class="item">
									<form action="{{ route('projects.create.contributor', $current) }}" method="POST" class="ui form">
										@csrf
										<div class="inline fields">
											<label>Ajouter contributeur</label>
											<div class="@error('user') error @endif field">
												<select name="user" id="user" class="ui search dropdown">
													<option value="" selected disabled>Utilisateur</option>
													@foreach ($users as $user)
														<option value="{{ $user->id }}">{{ $user->name }}</option>	
													@endforeach
												</select>
											</div>
											<div class="@error('role_description') error @endif field">
												<input type="text" name="role_description" placeholder="Role" value="{{ old('role_description') }}">
											</div>
											<div class="field">
												<button><i class="add icon"></i></button>
											</div>
										</div>
									</form>
									@if($errors->any())
										<div class="ui error message">
											<div class="header">
												Les informations fournies ne sont pas valides
											</div>
											<ul class="list">
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
											</ul>
										</div>
									@endif
								</div>
								@endcan
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection