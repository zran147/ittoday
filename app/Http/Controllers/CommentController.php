<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    public function indexdashboardcomment()
    {
        return view('dashboard.contact.indexdashboardcontact',[
            'comment' => Comment::all(),
        ]);
    }
    public function detaildashboardcomment($idcomment)
    {
        $idcomment = Crypt::decrypt($idcomment);
        $comemnt = Comment::findorfail($idcomment);
        
    }
}
