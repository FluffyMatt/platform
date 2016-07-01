<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('cms.users.index', compact('users'));
    }

    public function create()
    {
        return view('cms.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return redirect('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('cms.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('cms.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect('users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('users');
    }

    public function search(Request $request)
    {
        if ($request->query()) {
            $query = DB::table('users');

            foreach ($request->query() as $key => $value) {
                if ($key == 'orderby') {
                    $query->orderBy($key, $value);
                    unset($request->query()[$key]);
                } elseif ($key == 'query') {
                    $query->select('full_name', 'id');
                    $query->where('full_name', 'like', '%'.$value.'%');
                } else {
                    $query->where($request->query());
                }
            }

            $users = $query->get();
        }

        if (isset($users)) {
            return response()->json(['success' => true, 'users' => $users], 200);
        }

        return response()->json(['success' => false], 404);
    }
}
