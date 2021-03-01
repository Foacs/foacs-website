@extends('layouts.app')

@section('title' , 'Editer ' . $project->name)

@section('content')
<div class="ui main container">
    <div class="ui padded segment">
        <h1 class="ui header">
            <div class="content">
                {{ $project->name }}
                <div class="sub header">Editer</div>
            </div>
        </h1>
        <form action="{{ route('projects.edit.store', $project) }}" method="POST" class="ui form">
            @csrf
            <div class="field required">
                <label>Nom</label>
                <input type="text" name="name" value="{{ $project->name }}">
            </div>
            <div class="field">
                <label>Code</label>
                <input type="text" name="code" readonly value="{{ $project->code }}">
            </div>
            <div class="field">
                <label>Description</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>
            <input type="submit" class="ui primary button" value="Modifier">
            <a href="{{ route('projects.show', $project)}}" class="ui button">Annuler</a>
        </form>
    </div>
</div>
@endsection