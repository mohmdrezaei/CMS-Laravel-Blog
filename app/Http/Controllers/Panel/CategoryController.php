<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\CreateCategoryRequest;
use App\Http\Requests\Panel\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $parent_categories=Category::where('category_id',null)->get();
        $categories=Category::with('parent')->paginate(5);
        return view('panel.categories.index',compact('parent_categories','categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create(
            $request->validated()
        );
        session()->flash('status','دسته بندی مورد نظر با موفقیت ایجاد شد.');
        return back();
    }
    public function edit( Category $category)
    {
        $parent_categories=Category::where('category_id',null)->where('id','!=',$category->id)->get();
        return view('panel.categories.edit',compact('category','parent_categories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update(
            $request->validated()
        );
        session()->flash('status','دسته بندی با موفقیت بروزرسانی شد');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status','دسته بندی مورد نظر با موفقیت حذف گردید.');
        return back();

    }
}
