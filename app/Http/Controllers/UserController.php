<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
