<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = \Route::input('users');
        return [
			'name' => 'required',
			'username' => "required|unique:users,username,$id",
			'email' => "required|unique:users,email,$id",
			'password' => 'required',
		];
    }

    public function all()
    {
        $data = parent::all();
        $data["admin"] = @$data["admin"] ?: 0;
        $data["editor"] = @$data["editor"] ?: 0;
        $data["author"] = @$data["author"] ?: 0;
        return $data;
    }
}
