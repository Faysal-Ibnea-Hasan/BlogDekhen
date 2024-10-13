<?php

namespace App\Repositories\Blog;

use App\Enum\PostStatus;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function myBlog($id)
    {
        $myBlog = Post::where('user_id', $id)->with('users','categories','tags')->cursorPaginate(5);
        return $myBlog;
    }
    public function store_blog($blog)
    {
        $post = Post::create($blog);
        $post_id = $post->id;
        return $post_id;
    }
    public function update_blog($blog)
    {
        $blogs = Post::findOrFail($blog['id']);
        if($blogs){
            $blogs->update($blog);
        }
        return true;
    }
    public function change_status($id, $status){
        $blogs = Post::findOrFail($id);
        if($blogs){
            $blogs->status = $status;
            $blogs->save();
            return true;
        } else {
            return false;
        }
    }
    public function fetch_user_tags(){
        $tags = Tag::where('user_id',Auth::user()->id)->where('status',PostStatus::Active)->get();
        return $tags;
    }
    public function fetch_user_categories(){
        $categories = Category::where('user_id',Auth::user()->id)->where('status',PostStatus::Active)->get();
        return $categories;
    }
    public function store_post_tags($post_id, $tag_id){
        PostTag::create([
            'post_id' => $post_id,
            'tag_id' => $tag_id
        ]);
        return true;
    }
    public function store_category_post($post_id, $category_id){
        CategoryPost::create([
            'post_id' => $post_id,
            'category_id' => $category_id
        ]);
        return true;
    }
}