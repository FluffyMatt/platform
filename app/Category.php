<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function content() {
        return $this->belongsToMany('App\Content');
    }

    public function parent() {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Category', 'parent_id');
    }

}
