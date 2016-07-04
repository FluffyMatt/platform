<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppHelper;

class Category extends Model
{

	public $timestamps = false;

	public $tree = [];

	public $level;

    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

	public function getRouteKeyName()
	{
	    return 'slug';
	}

    public function content() {
        return $this->belongsToMany('App\Content');
    }

    public function parent() {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Category', 'parent_id')->orderBy('title');
    }

	public static function items($parent_slug = null) {
		if ($parent_slug) {
			$parent = Category::where('slug', $parent_slug)->firstOrFail();
			return $parent->children()->get();
		} else {
			return Category::whereNull('parent_id')->orderBy('title', 'asc')->get();
		}
	}

	public static function tree($parent = null) {

		$category = new Category();
		$categories = Category::items($parent);

		foreach ($categories as $c) {
			$category->level = 0;
			$category->treeLoop($c);
		}

		return $category->tree;
	}

	public function treeLoop($category) {

		$this->tree[$category->id] = AppHelper::indent($this->level) . $category['title'];
		$this->level++;
		foreach ($category->children as $category) {
			$this->treeLoop($category);
		}
	}

}
