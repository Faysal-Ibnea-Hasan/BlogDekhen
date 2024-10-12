<?php
namespace App\Repositories\Category;
use App\Models\Category;
use Auth;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create_category($category)
    {
        Category::create($category);
        return true;
    }
    public function get_category()
    {
        $category = Category::where('user_id', Auth::user()->id)->get();
        return $category;
    }
    public function change_status($id, $status)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->status = $status;
            $category->save();
            return true;
        } else {
            return false;
        }
    }
}