<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShowPostCategoryController extends Controller
{
    public function show(Category $category)
    {
        $categoryName = $category->name;
        $posts=$category->posts()->paginate(3);
        return view('index',compact('posts','categoryName'));
    }
}
