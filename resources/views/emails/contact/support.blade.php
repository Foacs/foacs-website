@extends('layouts.mail')
@section('title', 'Erreur dans l\'application'.$appName)

@section('content')

<div class="ui container">
    <h1 class="ui header">{{ $appName }}</h1>
    <div class="ui padded segment">
        <h2 class="ui header">Une erreur est survenue</h2>
        <p>
            Une erreur est survenue lors de l'execution de l'application <b>{{ $appName }}</b>.<br>
            Veuillez trouver ci-joint le fichier de log et les details de l'erreur.
        </p>
        <div class="ui divider"></div>
        <table class="ui definition striped table">
            <tbody>
                @forelse ($details as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
                @empty
                <tr>
                    <td>Aucun détail fournit.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
