<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'status'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category_post(){
        return $this->belongsToMany(CategoryPost::class);
    }
}
