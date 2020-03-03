<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts() {
        return $this->hasManyThrough(Post::class, UserProfile::class, 'country_id', 'user_id', 'id', 'user_id');
    }
}
