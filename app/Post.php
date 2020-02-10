<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fillable
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * Change the model route key
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}
