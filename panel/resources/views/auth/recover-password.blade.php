@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>بازنشانی رمز عبور</h5>

        @include('auth.layouts.partials.errors')
        <form method="POST" action="{{route('send_forget_password_token')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="email" class="form-control text-left" placeholder="ایمیل" dir="ltr" required autofocus>
            </div>
            <button class="btn btn-primary btn-block">ثبت</button>
            <hr>
            <p class="text-muted">یک عمل دیگر انجام دهید.</p>
            <a href="{{route('register')}}" class="btn btn-sm btn-outline-light mr-1 my-1">هم اکنون ثبت نام کنید!</a>
            یا
            <a href="{{route('login')}}" class="btn btn-sm btn-outline-light ml-1 my-1">وارد شوید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
