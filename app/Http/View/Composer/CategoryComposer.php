<?php
namespace App\Http\View\Composer;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {

    protected $categories;
    public function __construct()
    {
        $this->categories=Category::with('children')->where('category_id',null)->get();
    }

    public function compose(View $view)
    {
        $view->with('categories',$this->categories);
    }
}
