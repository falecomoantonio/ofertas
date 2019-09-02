<?php

namespace App\Entities;

use App\Traits\CryptId;

class Category extends CategoryBase
{
    use CryptId;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function super()
    {
        return $this->belongsTo(Category::class,'parent_id')->withDefault(function(){
            return new Category(['name'=>'Nenhum']);
        });
    }

    public function childrens()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
