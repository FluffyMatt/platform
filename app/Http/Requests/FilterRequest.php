<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FilterRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function all()
    {
		$data = parent::all();

		foreach ($data as $key => $value) {
			if ($value == '') {
				unset($data[$key]);
			}
		}

		return $data;
    }
}
