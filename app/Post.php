<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->hasOneThrough(UserProfile::class, User::class, 'id', 'user_id', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function setSlugAttribute($val)
    {   
        $slug = Str::slug($val, "-");
        $this->attributes['slug'] = strtolower($slug);
    }

    public function getSlugAttribute($val)
    {
        if($val == null) {
            return $this->id;
        }
        return $val;
    }
}
