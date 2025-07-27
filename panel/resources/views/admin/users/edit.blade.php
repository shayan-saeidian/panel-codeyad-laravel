@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h4 class="card-title">ویرایش کاربر</h4>
                <form method="POST" action="{{route('admin.user.update',$user->id)}}" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left"  dir="rtl" name="name", value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="email", value="{{$user->email}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ویرایش
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

