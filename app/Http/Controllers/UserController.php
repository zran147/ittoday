<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexdashboard()
    {
        return view('dashboard.user.indexusercontroller');
    }
    public function indexdashboardrole()
    {
        return view('dashboard.role.indexrolecontroller');
    }
    public function indexUser()
    {
        return view('profile.indexuser');
    }
    public function editProfileUser()
    {
        return view('profile.editprofileuser');
    }
    public function updateProfileUser(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[\pL\s\-]+$/u|unique:users,name,'.$user_id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user_id,
            'wa_user' => 'required|digits_between:10,15|unique:users,wa_user,'.$user_id,
        ]);

        $user = User::find($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'wa_user' => $request->wa_user,
        ]);
        if ($user) {
            return redirect('/profile')->with('success','profile telah diubah');
        }else{
            return redirect('/profile')->with('error','profile gagal diubah');
        }

    }
}
