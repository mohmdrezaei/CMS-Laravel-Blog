<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->status)){
            $comments=Comment::with(['user','post'])->where('status',$request->status)->withCount('replies')->paginate();
        }
        else
        {
            $comments=Comment::with(['user','post'])->withCount('replies')->paginate();
        }
        return view('panel.comments.index',compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'status' => ! $comment->status
        ]);
        session()->flash('status','نظر با موفقیت ویرایش شد .');
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('status','نظر با موفقیت حذف شد .');
        return back();
    }
}
