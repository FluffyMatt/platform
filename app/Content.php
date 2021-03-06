<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	use \Venturecraft\Revisionable\RevisionableTrait;

	const types = ['article', 'page', 'series', 'chapter'];

	protected $table = 'content';

    protected $fillable = [
		'type',
		'parent_id',
		'seo_index',
        'title',
        'seo_title',
        'description',
        'seo_description',
        'body',
		'commentable',
        'status',
        'published_at',
        'slug',
		'comment.content_id',
		'comment.user_id',
		'comment.status',
		'comment.message'
    ];

	public function getRouteKeyName()
	{
	    return 'slug';
	}

    public function users()
	{
        return $this->belongsToMany('App\User', 'content_users', 'content_id', 'user_id');
    }

    public function categories()
	{
        return $this->belongsToMany('App\Category', 'content_categories', 'content_id', 'category_id');
    }

    public function comments()
	{
        return $this->hasMany('App\Comment')->where('status', '!=', 'private');
    }

	public function notes()
	{
		return $this->hasMany('App\Comment')->where('status', 'private');
	}
}
