<?php
namespace App\Filters;
use App\Models\CategoryPost;
use App\Models\PostTag;
class BlogFilter extends QueryFilter{
    public function search($keyword){
        return $this->builder
            ->where('title','LIKE','%{$keyword}%')
            ->orWhere('content','LIKE','%{$keyword}%');
    }
    public function category($id)
    {
        return $this->builder->whereHas('categories', function($query) use ($id) {
            $query->where('categories.id', $id);
        });
    }

    public function tag($id)
    {
        return $this->builder->whereHas('tags', function($query) use ($id) {
            $query->where('tags.id', $id);
        });
    }
}