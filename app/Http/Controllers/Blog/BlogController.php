<?php

namespace App\Http\Controllers\Blog;

use App\Enum\PostStatus;
use App\Filters\BlogFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Category;
use App\Models\Tag;
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
    public function showBlog(Request $request)
    {
        $filters = new BlogFilter($request);
        $posts = Post::with('users', 'categories', 'tags')->filter($filters)->get();
        return response()->json($posts);
        // $posts = $this->blogRepository->all_blogs();
        // return view('blog.blog', [
        //     'posts' => $posts
        // ]);
    }
    public function details($id)
    {
        $blog = $this->blogRepository->blog_details($id);
        return view('blog.blog_details',[
            'blog' => $blog
        ]);
    }
    public function myBlog()
    {
        $userId = Auth::user()->id;
        $myBlog = $this->blogRepository->myBlog($userId);
        //dd($myBlog);
        return view('blog.my_blog', [
            'myBlog' => $myBlog
        ]);
    }
    public function create_blog()
    {
        $tags = $this->blogRepository->fetch_user_tags();
        $categories = $this->blogRepository->fetch_user_categories();
        return view('Components.create_blog', [
            'tags' => $tags,
            'categories' => $categories
        ]);
    }
    public function store(BlogRequest $request)
    {
        $blog = $request->all();
        $postId = $this->blogRepository->store_blog($blog);
        $post_id = $postId;
        $tag_id = $request->tag_id;
        $category_id = $request->category_id;
        $this->blogRepository->store_post_tags($post_id, $tag_id);
        $this->blogRepository->store_category_post($post_id, $category_id);
        return redirect()->route('myBlog');
    }
    public function edit(Request $request)
    {
        $post = Post::where('id', $request->id)->with('users', 'categories', 'tags')->first();
        //dd($post->tags);
        $tags = $this->blogRepository->fetch_user_tags();
        $categories = $this->blogRepository->fetch_user_categories();
        return view('Components.update_blog', [
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }
    public function update(BlogRequest $request)
    {
        $post = $request->all();
        //dd($post);
        $post_id = $post['id'];
        $tag_id = $request->tag_id;
        $category_id = $request->category_id;
        $this->blogRepository->update_post_tags($post_id, $tag_id);
        $this->blogRepository->update_category_post($post_id, $category_id);
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
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $this->blogRepository->change_status($id, $status);
        return response()->json([
            'status' => true,
        ]);
    }
}
