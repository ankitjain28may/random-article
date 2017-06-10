<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RandomArticle extends Model
{
    protected $table = 'randomArticle';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
