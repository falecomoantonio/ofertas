<?php

namespace App\Entities;

use App\Scope\CategoryBlogScope;

class CategoryBlog extends CategoryBase
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if(is_null($this->parent_id) || empty($this->parent_id))
            $this->parent_id = -1;
    }

    public static function boot()
    {
        parent::addGlobalScope(new CategoryBlogScope());
        parent::boot();
    }

    public function super()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
