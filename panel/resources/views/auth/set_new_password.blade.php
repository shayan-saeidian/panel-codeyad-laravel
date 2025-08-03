
@extends('auth.layouts.master')
@section('content')
    <div class="form-wrapper">

        <div class="logo">
            <img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <h5>بازیابی رمز عبور</h5>
        @include('auth.layouts.partials.errors')
        <form action="{{route('submit_new_password')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group">
                <input name="password" type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" >
            </div>
            <div class="form-group">
                <input name="password_confirmation" type="password" class="form-control text-left" placeholder="تکرار رمز عبور" dir="ltr" >
            </div>
            <button type="submit" class="btn btn-primary btn-block">تغییر رمز عبور</button>
        </form>
        <!-- ./ form -->

    </div>
@endsection
