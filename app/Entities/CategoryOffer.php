<?php

namespace App\Entities;

use App\Scope\CategoryOfferScope;

class CategoryOffer extends CategoryBase
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if(is_null($this->parent_id) || empty($this->parent_id))
            $this->parent_id = env('SUPER_CATEGORY_OFFER');
    }

    public static function boot()
    {
        parent::addGlobalScope(new CategoryOfferScope());
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
