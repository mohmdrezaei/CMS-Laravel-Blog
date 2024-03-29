<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'category_id');
    }

    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getParentName()
    {
        return is_null($this->parent) ? "doesn't have" : $this->parent->name;
    }
}
