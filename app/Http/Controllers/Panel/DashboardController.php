<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count=User::count();
        $comments_count= Comment::count();
        $posts_count= Post::count();
        $categories_count= Category::count();
        if (auth()->user()->role === 'author'){
            $posts_count= Post::where('user_id',auth()->user()->id)->count();
            $comments_count= Comment::whereHas('post',function ($query){
                return $query->where('user_id',auth()->user()->id);
            })->count();
        }
        return view('panel.index',compact('users_count','posts_count','comments_count','categories_count'));
   }
}
