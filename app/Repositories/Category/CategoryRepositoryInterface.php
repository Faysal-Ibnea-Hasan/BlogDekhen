<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface{
    public function create_category($category);
    public function get_category();
    public function change_status($id,$status);

}