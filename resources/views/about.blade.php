@extends('layouts.app')

@section('title' , 'A propos')

@section('content')
<div class="ui main container">
    <div class="ui center aligned vertical segment">
        <h2 class="ui header">À propos</h2>
        <p>
            Foacs est une assocation de fait qui à pour but de soutenir le développement d'application numérique libre (<a href="https://opensource.org" target="_blank">(en) open source</a>).<br /> 
            Elle se concentre sur le développement et le soutient, à l'aide de ses membres, de projet numérique libre ainsi que le partage de connaissances dans ce domaine.
            
        </p>
    </div>
    <div class="ui vertical segment">
        <div class="ui two statistics">
            <div class="statistic">
                <div class="value">3</div>
                <div class="label">Projets soutenus</div>
            </div>
            <div class="statistic">
                <div class="value">{{ $member_count }}</div>
                <div class="label">Membres</div>
            </div>
        </div>
    </div>
</div>
@endsection