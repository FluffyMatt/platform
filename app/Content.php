<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $fillable = [
        'title',
        'seo_title',
        'description',
        'seo_description',
        'body',
        'status',
        'published_at',
        'slug'
    ]

    public function users() {
        return $this->belongsToMany('App\User', 'content_users', 'user_id', 'content_id')
    }

}
