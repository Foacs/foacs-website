<div class="ui padded segment">
    <form action="{{ route('profile.save', $user) }}"  method="POST" class="ui form" >
        @csrf
        <div class="ui grid">
            <div class="two column row">
                <div class="three wide column">
                    <img class="ui rounded image" src="{{ $user->avatar() }}" alt="Avatar">
                </div>
                <div class="column">
                    <div class="content">
                        <div class="two fields">
                            <div class="field">
                                <label>Prénom</label>
                                <input type="text" name="first_name" value="{{ $user->first_name }}">
                            </div>
                            <div class="field">
                                <label>Nom</label>
                                <input type="text" name="last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <h2 class="ui header">
                            <div class="sub header">{{ $user->name }}</div>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="@error('phone_number') error @enderror field">
                        <label>Numéro téléphone <i>(privé)</i></label>
                        <input type="tel" value=" {{ old('phone_number') ?? $user->phone_number }}" name="phone_number">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" rows="2">{{ $user->bio }}</textarea>
        </div>
        
        <input type="submit" class="ui primary button" value="Modifier">
        <a href="{{ route('profile.show', $user->id) }}" class="ui button">Annuler </a>
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