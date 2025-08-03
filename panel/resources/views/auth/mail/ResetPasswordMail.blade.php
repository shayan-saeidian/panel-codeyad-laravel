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
{{--    <form method="POST" action="{{route('set_new_password',$token)}}">--}}
        <h1>بازیابی رمز عبور</h1>
        <a href="{{ route('set_new_password', $token)}}" target="_blank">
            <button type="button">بازیابی رمز عبور</button>
        </a>
{{--    </form>--}}
</body>
</html>
