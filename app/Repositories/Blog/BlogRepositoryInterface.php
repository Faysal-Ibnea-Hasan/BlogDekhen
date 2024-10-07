<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface{
    public function myBlog($id);
    public function store_blog($blog);
}