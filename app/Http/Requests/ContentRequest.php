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
        return [
            'title' => 'required',
            'status' => 'required',
			'slug' => 'required|unique:content'
        ];
    }

	public function all()
	{
		$data = parent::all();

		if (!isset($data["users"])) {
			$data["users"] = [];
		}
		if (!isset($data["categories"])) {
			$data["categories"] = [];
		}

		return $data;
	}
}
