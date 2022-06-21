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
        $comemnt = Comment::where('id',$idcomment)->first();
        $comemnt->update([
            'reply' => 'sudah dilihat'
        ]);
        return view('dashboard.contact.detaildashboardcomment',[
            'comment' => $comemnt
        ]);
    }
    public function deletedashboardcomment($idcomment)
    {
        Comment::find($idcomment)->delete();
        return back();
    }
}
