@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h4 class="card-title">ایجاد کاربر</h4>
                    @include('admin.users.errors')
                @php
                    $title="codeyad";
                @endphp
                <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <x-admin.text-input-component label="نام" name="name" :text="$title"/>
                    <x-admin.text-input-component label="نام خانوادگی" name="family"/>
                    <x-admin.text-input-component label="ایمیل" name="email"/>
                    <x-admin.text-input-component label="موبایل" name="mobile"/>
                    <x-admin.text-input-component label="رمزعبور" name="password"/>
                    <x-admin.text-input-component label="عکس" name="image" type="file"/>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

