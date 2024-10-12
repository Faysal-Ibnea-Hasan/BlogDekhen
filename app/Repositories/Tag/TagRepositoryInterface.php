<?php
namespace App\Repositories\Tag;

interface TagRepositoryInterface{
    public function create_tag($tag);
    public function get_tags();
    public function change_status($id,$status);
}