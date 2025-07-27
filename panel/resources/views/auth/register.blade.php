
@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>ایجاد حساب</h5>

        <!-- form -->
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="نام" required autofocus>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="نام خانوادگی" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control text-left" placeholder="ایمیل" dir="ltr" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" required>
            </div>
            <button class="btn btn-primary btn-block">ثبت نام</button>
            <hr>
            <p class="text-muted">حساب کاربری دارید؟</p>
            <a href="login.blade.php" class="btn btn-outline-light btn-sm">وارد شوید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
