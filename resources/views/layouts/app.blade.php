<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>Foacs - @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('/img/icon.ico') }}"  ttype="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.min.css') }}">
        <script
          src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
        <script
            src="{{ URL::asset('css/semantic.min.js') }}"></script>
        <style>
            body {
                font-family: 'Nunito';
            }

            .ui.container.flash {
                position: absolute;
                right: 0;
                left: 0;
                z-index: 1000;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(() => {
                $('.flash').delay(4000).fadeOut(300);
            });
        </script>
        @yield('styles')
    </head>
    <body>
        <div class="ui pointing menu">
            <div class="ui container">            
                <a href="{{ route('home') }}" class="header {{ $active=='home'?'active':'' }} item">Foacs</a>
                <a href="{{ route('projects.index') }}" class="{{ $active=='projects'?'active':'' }} item">Projets</a>
                <a href="{{ route('about') }}" class="{{ $active=='about'?'active':'' }} item">A propos</a>
                
                <div class="right menu">
                    <div class="item">
                        <div class="ui icon input">
                            <input type="text" placeholder="Chercher...">
                            <i class="search link icon"></i>
                        </div>
                    </div>
                    @if (Route::has('auth.login'))
                        @auth
                            <a href="{{ route('profile.show', ['id' => Auth::id()]) }}" class="ui item">{{ Auth::user()->name }}</a>
                            <a href="{{ route('auth.logout') }}" class="ui item">Déconnexion</a>
                        @else
                            <a href="{{ route('auth.login') }}" class="ui item">Connexion</a>

                            @if (Route::has('auth.register'))
                                <a href="{{ route('auth.register') }}" class="ui item">S'inscrire</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="ui container flash">
                <div class="ui positive icon message">
                    <i class="check icon"></i>
                    <div class="content">
                        @if (session()->has('success-title'))
                            <div class="header">
                                {{ session('success-title') }}
                            </div>
                        @endif
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="ui container flash">
                <div class="ui warning icon message">
                    <i class="exclamation icon"></i>
                    <div class="content">
                        @if (session()->has('warning-title'))
                            <div class="header">
                                {{ session('warning-title') }}
                            </div>
                        @endif
                        {{ session('warning') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="ui container flash">
                <div class="ui negative icon message">
                    <i class="close icon"></i>
                    <div class="content">
                        @if (session()->has('error-title'))
                            <div class="header">
                                {{ session('error-title') }}
                            </div>
                        @endif
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
        <div class="ui footer segment">
            <div class="ui container">
                <div class="ui stackable divided equal height stackable center grid">
                    <div class="five wide column">
                        <h4 class="ui header">A propos</h4>
                        <div class="ui link list">
                            <a href="" class="item">Sitemap</a>
                            <a href="{{ route('contact') }}" class="item">Contact</a>
                            <a href="" class="item">CGU</a>
                        </div>
                    </div>
                    <div class="five wide column">
                        <h4 class="ui header">Liens</h4>
                        <ui class="ui link list">
                            <a href="https://github.com/Foacs" target="_blank" class="item">
                                <i class="github icon"></i>Github
                            </a>
                            <a href="https://discord.gg/VWX9pybWvT" target="_blank" class="item">
                                <i class="discord icon"></i>Discord
                            </a>
                        </ui>
                    </div>
                    <div class="three wide column">
                        <p>
                            Copyright © 2021 Foacs.
                            @yield('copyrights')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>