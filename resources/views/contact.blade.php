@extends('layouts.app')

@section('title' , 'Contact')

@section('content')
<div class="ui main container">
    <div class="ui segment">
        <h1 class="ui header">Contact</h1>
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('contact.send') }}" method="POST" class="ui form">
            @csrf
            <div class="two fields">
                <div class="required @error('email')error @enderror field">
                    <label>Email</label>
                    <div class="ui left icon input">
                        <i class="envelope icon"></i>
                        <input type="mail" name="email" placeholder="Votre adresse email" value="{{ old('email') }}">
                    </div>
                </div><div class="required @error('name')error @enderror field">
                    <label>Nom</label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="mail" name="name" placeholder="Votre nom" value="{{ old('name') }}">
                    </div>
                </div>
            </div>
            <div class="required @error('message')error @enderror field">
                <label>Message</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message">{{ old('message') }}</textarea>
            </div>
            <input type="submit" class="ui fluid large teal submit button" value="Envoyer">
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