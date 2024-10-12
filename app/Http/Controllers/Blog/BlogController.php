<?php

namespace App\Http\Controllers\Blog;

use App\Enum\PostStatus;
use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class BlogController extends Controller
{
    protected $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function showBlog()
    {
        $posts = Post::where('status', PostStatus::Active)->with('users')->get();
        return view('blog.blog', [
            'posts' => $posts
        ]);
    }
    public function myBlog()
    {
        $userId = Auth::user()->id;
        $myBlog = $this->blogRepository->myBlog($userId);
        //dd($myBlog);
        $myBlogCount = $myBlog->count();
        return view('blog.my_blog', [
            'myBlog' => $myBlog
        ]);
    }
    public function create_blog()
    {
        return view('Components.create_blog');
    }
    public function store(Request $request)
    {
        $blog = $request->all();
        $this->blogRepository->store_blog($blog);
        return redirect()->route('myBlog');
    }
    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->id);
        return view('Components.update_blog', [
            'post' => $post
        ]);
    }
    public function update(Request $request)
    {
        $post = $request->all();
        $this->blogRepository->update_blog($post);
        return redirect()->route('myBlog');
    }
    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if ($post) {
            $post->delete();

            return response()->json([
                'status' => true,
                'message' => 'Post deleted successfully'
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete the item.'], 500);
        }
    }
    public function changeStatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        $this->blogRepository->change_status($id,$status);
        return response()->json([
            'status' => true,
        ]);
    }
}
