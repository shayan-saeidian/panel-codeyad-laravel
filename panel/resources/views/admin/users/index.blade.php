
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
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                        <th class="text-center align-middle text-primary">ایمیل</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        <th class="text-center align-middle text-primary">وضعیت</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">دانلود</th>
                        <th class="text-center align-middle text-primary">حذف</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $index=>$user)
                        <tr>
                            <td class="text-center align-middle">{{$users->firstItem()+$index}}</td>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="{{url('images').'/'.$user->image_show?->name}}" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle">{{$user->full_name}}</td>
                            <td class="text-center align-middle">{{$user->email}}</td>
                            <td class="text-center align-middle">{{$user->created_at}}</td>
                            <td
                                @class([
                                    'text-center align-middle',
                                    'text-danger'=>$user->status==\App\Enum\UserStatus::Inactive->value,
                                    'text-success'=>$user->status==\App\Enum\UserStatus::Active->value,
                                ])>
                                {{$user->status}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="{{route('admin.user.edit',$user->id)}}">
                                    ویرایش
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="{{route('admin.user.download',$user->id)}}" >
                                    @csrf
                                    <input type="submit" class="btn btn-outline-info" value="دانلود">
                                </form>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="{{route('admin.user.delete',$user->id)}}" >
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

