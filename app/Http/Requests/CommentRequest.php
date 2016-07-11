<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;
use App\Content;

class CommentRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => "required"
        ];
    }

	public function all()
	{
		$data = parent::all();

		if (Request::server('HTTP_REFERER')) {
			$slug = explode('/', Request::server('HTTP_REFERER'))[3];
			$content = Content::where('slug', $slug)->firstOrFail();
			$data['content_id'] = $content->id;
		}

		if (!Auth::user()->admin && !Auth::user()->editor && !Auth::user()->author) {
			unset($data['status']);
		} else {
			$data['status'] = 'approved';
		}

		return $data;
	}
}
