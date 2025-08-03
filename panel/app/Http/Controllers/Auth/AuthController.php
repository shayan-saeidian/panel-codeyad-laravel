<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function enterUser(UserLoginRequest $request)
    {
        $user=User::query()->where('email',$request->email)->first();
        if (Hash::check($request->password,$user->password)) {
            Auth::login($user);
            return redirect()->route('admin.users.index');
        }
        return redirect()->back()->withErrors(['password' => 'پسورد وارد شده صحیح نمی باشد']);
    }
    public function register()
    {
        return view('auth.register');
    }
    public function submitUser(UserRegisterRequest $request)
    {
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        User::query()->create($data);
        return redirect()->route('login');
    }
    public function forgetPassword()
    {
        return view('auth.recover-password');
    }
}
