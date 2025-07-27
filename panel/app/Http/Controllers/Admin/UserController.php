<?php

namespace App\Http\Controllers\Admin;

use App\Enum\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
//        $users=DB::table('users')->get();

        $users=User::query()->paginate('3');
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(UserRequest $request){
        $hash_name=$request->image->hashName();
        $request->image->storeAs('images',$hash_name);
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $data['image']=$hash_name;
        $user=User::query()->create($data);
        $user->image()->create([
            'name'=>$hash_name
        ]);

        return redirect()->route('admin.users.index');
    }
    public function edit($id){
        $user=User::query()->find($id);
//        $user=DB::table('users')->where('id',$id)->first();
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request,$id){
//        $user=DB::table('users')->where('id',$id)->first();
        $user=User::query()->find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? HASH::make($request->password) : $user->password,
        ]);
//        DB::table('users')->where('id',$id)->update([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => $request->password ? HASH::make($request->password) : $user->password,
//        ]);
        return redirect()->route('admin.users.index')->with('success','user updated successfully');
    }
    public function destroy($id){
//        DB::table('users')->where('id',$id)->delete();
        User::Destroy($id);
        return redirect()->route('admin.users.index');

    }
    public function force_delete($id){
        $user=User::query()->find($id);
        unlink(public_path('images'.'/'.$user->image));
        User::forceDestroy($id);
        return redirect()->route('admin.user.deletedUsers');

    }
    public function restore($id){
        $user=User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()->route('admin.users.index');
    }

    public function deletedUsers()
    {
        $deleted_users=User::onlyTrashed()->get();
        return view('admin.users.deleted_users',compact('deleted_users'));
    }
    public function download($id){
        $user=User::query()->find($id);
        return response()->download(public_path('images'.'/'.$user->image));
    }


}
