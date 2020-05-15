<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommentController extends Controller
{


   // send msg
   public function StoreComment(Request $request,$id){


    $validataedata = $request->validate([
        'name' => 'required|min:4|max:30',
        'email' => 'required|email',
        'comment' => 'required|min:4|max:255',
    ],
    [
    'name.required' => 'Input Your name',
    'email.required' => 'Input Your Email',
    'email.email' => 'Invalid Email',
    'comment.required' => 'Type Your Comment',

    ]);

    $comment = Comment::insert([
        'post_id' => $id,
        'name' => $request->name,
        'email' => $request->email,
        'comment' => $request->comment,
        'created_at' => Carbon::now()

    ]);

        if ($comment) {
            $notification=array(
                'messege'=>'Comment Submitted Needs Approve',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

}
