<?php

namespace App\Repositories\Blog;

use App\Models\Post;

class BlogRepository implements BlogRepositoryInterface{
    public function myBlog($id){
        $myBlog = Post::where('user_id',$id)->with('users')->get();
        return $myBlog;
    }
    public function store_blog($blog){
        Post::create($blog);
        return true;
    }
}