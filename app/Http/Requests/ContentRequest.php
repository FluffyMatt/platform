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
            'type' => "required",
            'status' => "required",
			'slug' => "required|unique:content,slug,$current_slug"
        ];
    }

	public function all()
	{
		$data = parent::all();

		if (empty($data['published_at'])) {
			unset($data['published_at']);
		}

		return $data;
	}
}
