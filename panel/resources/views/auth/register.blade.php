
@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <h5>ایجاد حساب</h5>
        @include('auth.layouts.partials.errors')
        <form action="{{route('submit_user')}}" method="POST">
            @csrf
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="نام"  autofocus>
            </div>
            <div class="form-group">
                <input name="family" type="text" class="form-control" placeholder="نام خانوادگی" >
            </div>
            <div class="form-group">
                <input name="email" type="text" class="form-control text-left" placeholder="ایمیل" dir="ltr" >
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" >
            </div>
            <div class="form-group">
                <input name="password_confirmation" type="password" class="form-control text-left" placeholder="تکرار رمز عبور" dir="ltr" >
            </div>
            <button type="submit" class="btn btn-primary btn-block">ثبت نام</button>
            <hr>
            <p class="text-muted">حساب کاربری دارید؟</p>
            <a href="{{route('login')}}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
