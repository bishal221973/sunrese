<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserCOntroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users=User::latest()->get();
        return view('user.index',compact('users'));
    }
    public function create(User $user)
    {
        $roles = Role::latest()->get();
        return view('user.form', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        // return $request;
        $user=$request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
        ]);
        $user['password']=Hash::make($request->password);
        $saved=User::create($user);
        if ($user) {
            foreach($request->roles as $role){
                $saved->assignRole($request->roles);

                // $user->syncRoles($request->roles);
            }
        }

        return redirect()->back()->with('success',"New user successfully registered");

        // return redirect()->route('user.index')->with('success', 'User has been added with username ' . $user->username);
    }

    public function destroy($user)
    {
        User::find($user)->delete();
        return redirect()->back()->with("success","Selected user successfully removed");
    }

    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('user.form', compact('user', 'roles'));
    }

    public function update(Request $request,$user)
    {
        $userData=$request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
        ]);
        $saved=User::find($user)->update($userData);
        if ($saved) {
            foreach($request->roles as $role){
                // echo $role;
                // return;
                // User::find($user)->syncRole($role);
                // $user->syncRoles($request->roles);

                // $user->syncRoles($request->roles);
            }
        }

        return redirect()->route('user')->with('success',"New user successfully registered");
    }

    public function editProfile(Request $request,User $user)
    {
        $roles = Role::latest()->get();
        return view('user.form', compact('user', 'roles'));
    }

    public function editPassword(User $user)
    {
        return view('user.password', compact('user',));
    }

    public function updatePassword(Request $request, User $user)
    {
        $data=$request->validate([
            'password'=>'required|confirmed|min:8',
        ]);

        $user->update($data);
        return redirect()->back()->with('success',"Pasword changed");
    }
}
