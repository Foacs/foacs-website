@extends('layouts.mail')
@section('title', 'Message de '.$userName)

@section('content')
<div class="ui container">
    <h1 class="ui header">Message de {{ $userName }}</h1>
    <div class="ui padded segment">
        <h2 class="ui header">Un message vous a été envoyé</h2>
        <div class="ui padded segment">
            {{$messageText}}
        </div>
    </div>
</div>

@endsection
