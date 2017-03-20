<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Timestamps are disabled for this entity.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fields that can be filled using an object.
     *
     * @var array
     */
    protected $fillable = ['title', 'price'];
}
