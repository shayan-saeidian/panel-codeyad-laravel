<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--    @if(auth()->check())--}}
{{--        <h1>{{ auth()->user()->name }}</h1>--}}
{{--    @else--}}
{{--        <h1>Guest</h1>--}}
{{--    @endif--}}
        @auth()
            <h1>{{ auth()->user()->name }}</h1>
        @endauth
        @guest
            <a href="{{ route('login') }}">login</a>
        @endguest

</body>
</html>
