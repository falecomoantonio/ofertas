<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $table = 'meta_data';

    protected $primaryKey = 'id';

    protected $fillable = ['key','value'];

    public $timestamps=false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getKeyName()
    {
        return "key";
    }
}
