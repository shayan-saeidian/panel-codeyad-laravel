@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->
        @include('auth.layouts.partials.errors')
        <h5>ورود</h5>

        <!-- form -->
        <form method="POST" action="{{route('enter')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="email" class="form-control text-left" placeholder="ایمیل" dir="ltr"  autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" >
            </div>
            <div class="form-group d-sm-flex justify-content-between text-left mb-4">
                <div class="custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" checked id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">به خاطر سپاری</label>
                </div>
                <a class="d-block mt-2 mt-sm-0" href="{{route('forget_password')}}">بازنشانی رمز عبور</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block">ورود</button>
            <hr>
            <p class="text-muted">حسابی ندارید؟</p>
            <a href="{{route('register')}}" class="btn btn-outline-light btn-sm">هم اکنون ثبت نام کنید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
