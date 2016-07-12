<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class AppHelper
{
	// Checks URL segments for a match to determine if given segment is active
	public static function is_active($segment)
	{
		$active = '';
		if (Request::is($segment)) {
			$active = 'active';
		}
		return $active;
	}

	// Checks URL segments for a match to determine if given segment is an active parent
	public static function is_active_parent($segment)
	{
		$active = '';
		if (Request::is($segment) || Request::is($segment.'/*')) {
			$active = 'active-parent';
		}
		return $active;
	}

	// Tree level indenter
	public static function indent($level)
	{
		$indent = '';
		for ($i = 0; $i < $level; $i++) {
			$indent .= '- ';
		}
		return $indent;
	}

	// Detect whether on the CMS or site
	public static function isCms() {
		if (Request::is('cms') or Request::is('cms/*')) {
			return true;
		} else {
			return false;
		}
	}

}
