<?php

namespace App\Entities;

use App\Scope\CategoryOfferScope;

class CategoryOffer extends Category
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('SUPER_CATEGORY_OFFER');
    }

    public static function boot()
    {
        parent::addGlobalScope(new CategoryOfferScope());
        parent::boot();
    }
}
