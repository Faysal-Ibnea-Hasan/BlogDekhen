<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'status',
        'image'
    ];
    public function scopeFilter($query, QueryFilter $filters){
        return $filters->apply($query);
    }
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
