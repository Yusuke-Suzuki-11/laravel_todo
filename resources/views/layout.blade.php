<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ToDo App</title>
        @yield('styles')
        <link rel="stylesheet" href="/scss/styles.scss">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    </head>
    <body style="background-color: #e9fbfb;" >

        <header>
            @include('share.navbar')
        </header>



            @yield('content')

        @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
        @endif
        @yield('scripts')

    </body>
</html>
