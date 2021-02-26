<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>Foacs - @yield('title')</title>

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
            body > .grid {
                height: 100%;
            }
            .column {
                max-width: 450px;
            }
        </style>
    </head>
    <body>
        @if (session()->has('success'))
            <div class="ui container flash">
                <div class="ui success icon message">
                    <i class="check icon"></i>
                    <div class="content">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="ui container flash">
                <div class="ui error icon message">
                    <i class="check icon"></i>
                    <div class="content">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                @yield('content')
            </div>
        </div>
    </body>
</html>