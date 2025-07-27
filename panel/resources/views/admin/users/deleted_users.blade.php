
@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                @if(session()->has('success'))
                    <p>{{session('success')}}</p>
                @endif

                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                        <th class="text-center align-middle text-primary">ایمیل</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        <th class="text-center align-middle text-primary">بازیابی</th>
                        <th class="text-center align-middle text-primary">حذف</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($deleted_users as $user)
                        <tr>
                            <td class="text-center align-middle">{{$user->name}}</td>
                            <td class="text-center align-middle">{{$user->email}}</td>
                            <td class="text-center align-middle">{{$user->created_at}}</td>
                            <td class="text-center align-middle">
                                <form method="POST" action="{{route('admin.user.restore',$user->id)}}" >
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-outline-info" value="بازیابی">
                                </form>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="{{route('admin.user.force_delete',$user->id)}}" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-info" value="حذف">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
@endsection

