<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Change the model route key
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}
