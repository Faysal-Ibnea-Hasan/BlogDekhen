<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function showBlog(){
        return view('blog.blog');
    }
    public function myBlog(){
        $userId = Auth::user()->id;
        $myBlog = $this->blogRepository->myBlog($userId);
        //dd($myBlog);
        return view('blog.my_blog',[
            'myBlog' => $myBlog
        ]);
    }
    public function create_blog(){
        return view('Components.create_blog');
    }
    public function store(Request $request){
        $blog = $request->all();
        $this->blogRepository->store_blog($blog);
        return redirect()->route('myBlog');
    }
    public function edit(Request $request){
        
    }
}
