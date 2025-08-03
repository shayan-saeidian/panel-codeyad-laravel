<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendPasswordForgetRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\table;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function enterUser(UserLoginRequest $request)
    {
//        $user=User::query()->where('email',$request->email)->first();
//        if (Hash::check($request->password,$user->password)) {
//            Auth::login($user);
//            return redirect()->route('admin.users.index');
//        }
//        $remember = $request->remember == 'on' ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));

    }

    public function forgetPasswordToken(SendPasswordForgetRequest $request)
    {
        $exits=DB::table('password_reset_tokens')->where('email', $request->email)->exists();
        if($exits){
            return redirect()->back()->withErrors(['email' => 'درخواست تکراری']);
        }
        $email=$request->email;
        $token=str()->random(60);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at'=>now()
        ]);
        Mail::send(new ResetPasswordEmail($token,$email));
        return redirect()->back()->withErrors(['email' => 'ایمیل با موفقیت ارسال شد']);
    }

    public function setNewPassword($token)
    {
        return view('auth.set_new_password',compact('token'));
    }

    public function SubmitNewPassword(Request $request)
    {
        $email=DB::table('password_reset_tokens')->where('token',$request->token)->first()->email;
        User::query()->where('email', $email)->update(['password'=>Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where('email', $email)->delete();
        return redirect()->route('login');

    }
}
