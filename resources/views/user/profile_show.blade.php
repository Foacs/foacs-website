
<div class="ui segment">
    <div class="ui grid">
        <div class="row">
            <div class="column">
                <h2 class="ui header">
                    <img class="ui rounded image" src="{{ $user->avatar() }}" alt="Avatar">
                    <div class="content">
                        {{ $user->first_name??'Prénom' }} {{ $user->last_name??'NOM' }}
                        <div class="sub header">{{ $user->name }}</div>
                    </div>
                </h2>
            </div>
        </div>
        @can('seePhoneNumber', $user)
        <div class="row">
            <div class="column">
                <i class="phone icon"></i>
                {{ $user->phone_number }}
            </div>
        </div>
        @endcan
        <div class="row">
            <div class="column">
                <p>{{ $user->bio??'Bio' }}</p>
            </div>
        </div>
        @can ('update', $user)
        <div class="row">
            <div class="column">
                <a href="{{ route('profile.edit', $user) }}" class="ui small button">Modifer le profil</a>
                <a href="{{ route('password.change', $user) }}" class="ui small button">Changer mot de passe</a>
            </div>
        </div>
        @endcan
    </div>
</div>