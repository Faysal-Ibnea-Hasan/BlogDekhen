<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function store(CategoryRequest $request)
    {
        $category = $request->all();
        $this->categoryRepository->create_category($category);
        return response()->json([
            'status' => true,
            'message' => 'Category added successfully'
        ], 200);
    }
    public function myCategories()
    {
        $categories = $this->categoryRepository->get_category();
        return view('category.myCategory', [
            'categories' => $categories
        ]);
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $this->categoryRepository->change_status($id,$status);
        return response()->json([
            'status' => true,
            'message' => 'Category status updated successfully'
        ]);
    }
    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if ($category) {
            $category->delete();
            return response()->json([
                'status' => true,
                'message' => 'Category deleted successfully'
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete the category.'], 500);
        }
    }
}
