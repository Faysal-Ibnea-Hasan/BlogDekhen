<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface{
    public function all_blogs();
    public function blog_details($id);
    public function myBlog($id);
    public function store_blog($blog);
    public function update_blog($blog);
    public function change_status($id, $status);
    public function fetch_user_tags();
    public function fetch_user_categories();
    public function store_post_tags($post_id, $tag_id);
    public function store_category_post($post_id, $category_id);
    public function update_post_tags($post_id, $tag_id);
    public function update_category_post($post_id, $category_id);
}