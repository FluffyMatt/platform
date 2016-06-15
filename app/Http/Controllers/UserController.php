<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class UserController extends Controller
{

    public function search(Request $request) {

        $query = DB::table('users');

        foreach ($request->query() as $key => $value) {
            if ($key == 'orderby') {
                $query->orderBy($key, $value);
                unset($request->query()[$key]);
            } else if($key == 'query') {
                $query->select('name', 'id');
                $query->where('name', 'like', '%'.$value.'%');
            } else {
                $query->where($request->query());
            }
        }


        $users = $query->get();

        if ($users) {

            return response()->json(['success' => true, 'users' => $users], 200);

        }

        return response()->json(['success' => false], 404);

    }

}
