<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	const status = ['pending', 'approved', 'rejected', 'spam', 'private'];

	protected $fillable = [
		'user_id',
		'content_id',
		'message',
		'status'
	];

	public function content()
	{
		return $this->belongsTo('App\Content');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
