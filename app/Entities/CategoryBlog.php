<?php

namespace App\Entities;

use App\Scope\CategoryBlogScope;

class CategoryBlog extends Category
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('SUPER_CATEGORY_BLOG');
    }

    public static function boot()
    {
        parent::addGlobalScope(new CategoryBlogScope());
        parent::boot();
    }
}
