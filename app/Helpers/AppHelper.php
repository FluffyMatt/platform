<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class AppHelper
{

	// Checks URL segments for a match to determine if given segment is active
	public static function is_active($segment)
	{
		$active = '';
		if (Request::is($segment) || Request::is($segment.'/*')) {
			$active = 'active';
		}
		return $active;
	}

}
