<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContentRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		$current_slug = \Route::input('content');

        return [
            'title' => "required",
            'status' => "required",
			'slug' => "required|unique:content,slug,$current_slug"
        ];
    }

	public function all()
	{
		$data = parent::all();

		return $data;
	}
}
