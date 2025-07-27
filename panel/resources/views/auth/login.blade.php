@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>ورود</h5>

        <!-- form -->
        <form>
            <div class="form-group">
                <input type="text" class="form-control text-left" placeholder="نام کاربری یا ایمیل" dir="ltr" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" required>
            </div>
            <div class="form-group d-sm-flex justify-content-between text-left mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">به خاطر سپاری</label>
                </div>
                <a class="d-block mt-2 mt-sm-0" href="recover-password.blade.php">بازنشانی رمز عبور</a>
            </div>
            <button class="btn btn-primary btn-block">ورود</button>
            <hr>
            <p class="text-muted">حسابی ندارید؟</p>
            <a href="register.blade.php" class="btn btn-outline-light btn-sm">هم اکنون ثبت نام کنید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
