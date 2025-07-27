@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>بازنشانی رمز عبور</h5>

        <!-- form -->
        <form>
            <div class="form-group">
                <input type="text" class="form-control text-left" placeholder="نام کاربری یا ایمیل" dir="ltr" required autofocus>
            </div>
            <button class="btn btn-primary btn-block">ثبت</button>
            <hr>
            <p class="text-muted">یک عمل دیگر انجام دهید.</p>
            <a href="register.blade.php" class="btn btn-sm btn-outline-light mr-1 my-1">هم اکنون ثبت نام کنید!</a>
            یا
            <a href="login.blade.php" class="btn btn-sm btn-outline-light ml-1 my-1">وارد شوید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
