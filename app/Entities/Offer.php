<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'offers';

    protected $fillable = ['title', 'content', 'gallery', 'price','owner_id','category_id'];

    protected $casts = [
        'gallery' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo(CategoryOffer::class,'category_id');
    }
}
