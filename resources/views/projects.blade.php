@extends('layouts.app')

@section('title' , 'Projets')

@section('content')
<div class="ui main container">
    <div class="ui segment">
		<div class="ui grid">
			<div class="one column row">
				<div class="column">
					<div class="ui center aligned container">
						<h2 class="ui header">Les projets</h2>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="four wide column">
					<div class="ui vertical fluid tabular menu">
						@forelse($projects as $project)
							<a href="{{ route('projects.show', ['id' => $project->id]) }}" 
								class="{{ $prj==$project->name?'active':'' }} item">
								{{ $project->name }}
							</a>
						@empty
							<p>Aucun projet</p>
						@endforelse
					</div>
				</div>
				<div class="twelve wide streched column">
					<div class="ui satcked segment">
						@if(isset($current))
							<h3>{{ $current->name }}</h3>
							<p>
								{{ $current->description }}
							</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection