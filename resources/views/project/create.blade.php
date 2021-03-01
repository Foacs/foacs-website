@extends('layouts.app')

@section('title' , 'Créer projet')

@section('content')
<div class="ui main container">
    <div class="ui segment">
        <h1 class="ui header">
            <div class="content">Créer projet</div>
        </h1>
        <form action="{{ route('projects.create.store') }}" method="POST" class="ui form">
            @csrf
            <div class="required @error('name') error @enderror field">
                <label>Nom</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="required @error('code') error @enderror field">
                <label>Code</label>
                <input type="text" name="code" value="{{ old('code') }}">
            </div>
            <div class="required @error('description') error @enderror field">
                <label>Description</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="@error('support_mail') error @enderror field">
                <label>Email support</label>
                <input type="email" name="support_mail" value="{{ old('support_mail') }}">
            </div>
            <input type="submit" class="ui primary button" value="Créer">
            <a href="{{ route('projects.index')}}" class="ui button">Annuler</a>
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
</div>
@endsection