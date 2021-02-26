@extends('layouts.app')

@section('title' , 'Contact')

@section('content')
<div class="ui main container">
    <div class="ui segment">
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form action="" >
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="mail" name="email" placeholder="Votre adresse email">
                </div>
            </div>
            <div class="field">
                <textarea name="message" id="message" cols="30" rows="10" />
            </div>
            <input type="submit" class="ui fluid large teal submit button" value="Envoyer">
        </form>  
    </div>
</div>
@endsection