<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','post_id'];
    protected $table = 'category_post';
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function posts(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
