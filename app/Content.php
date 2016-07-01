<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $table = 'content';

    protected $fillable = [
		'seo_index',
        'title',
        'seo_title',
        'description',
        'seo_description',
        'body',
        'status',
        'published_at',
        'slug'
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'content_users', 'content_id', 'user_id');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'content_categories', 'content_id', 'category_id');
    }

}
