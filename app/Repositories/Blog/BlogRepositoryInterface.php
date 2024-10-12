<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface{
    public function myBlog($id);
    public function store_blog($blog);
    public function update_blog($blog);
    public function change_status($id, $status);
}