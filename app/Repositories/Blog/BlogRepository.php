<?php

namespace App\Repositories\Blog;

use App\Models\Post;

class BlogRepository implements BlogRepositoryInterface
{
    public function myBlog($id)
    {
        $myBlog = Post::where('user_id', $id)->with('users')->cursorPaginate(5);
        return $myBlog;
    }
    public function store_blog($blog)
    {
        Post::create($blog);
        return true;
    }
    public function update_blog($blog)
    {
        $blogs = Post::findOrFail($blog['id']);
        if($blogs){
            $blogs->update($blog);
        }
        return true;
    }
}