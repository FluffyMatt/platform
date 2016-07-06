<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;

class CommentRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		$current_slug = \Route::input('content');

        return [
            'message' => "required"
        ];
    }

	public function all()
	{
		$data = parent::all();

		if (!Auth::user()->admin && !Auth::user()->editor && !Auth::user()->author) {
			unset($data['status']);
		}

		return $data;
	}
}
