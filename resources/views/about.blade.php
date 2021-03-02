@extends('layouts.app')

@section('title' , 'A propos')

@section('content')
<div class="ui main container">
    <div class="ui center aligned vertical segment">
        <h2 class="ui header">À propos</h2>
        <p>
            Foacs est une assocation de fait qui a pour but de soutenir le développement d'applications numériques libres (<a href="https://opensource.org" target="_blank" rel="noreferrer"><i>(en)</i>open source</a>).<br /> 
            Elle se concentre sur le développement et le soutien, à l'aide de ses membres, de projets numériques libres ainsi que le partage de connaissances dans ce domaine.
            
        </p>
    </div>
    <div class="ui vertical segment">
        <div class="ui two statistics">
            <div class="statistic">
                <div class="value">{{ App\Models\Project::count() }}</div>
                <div class="label">Projets soutenus</div>
            </div>
            <div class="statistic">
                <div class="value">{{ App\Models\User::count() }}</div>
                <div class="label">Membres</div>
            </div>
        </div>
    </div>
</div>
@endsection