<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Http\Requests;

class ContentController extends Controller
{

    public function index()
    {
        $allContent = Content::orderBy('created_at', 'desc')->paginate(15);

        return view('content.index', ['allContent' => $allContent]);
    }

    public function create() {
        return view('content.add');
    }

    public function store(Request $request) {

        $data = $request->all();

        if ($saved = Content::create($data)) {
            if ($saved->users()->sync($data['users'])){ #&& $saved->users()->sync($data['categories'])) {
                return redirect('content/'.$saved->id.'/edit');
            }
        }
        else {
            $request->session()->flash('error', 'Error saving content');
        }

    }

    public function edit($id) {

        $content = Content::with('users')->findOrFail($id);

        return view('content.edit', ['content' => $content]);

    }

    public function update(Request $request, $id) {

        $content = Content::findOrFail($id);

        if ($content->update($data)) {
            $request->session()->flash('success', 'Content saved');
            return redirect('content/'.$id.'/edit');
        }
        else {
            $request->session()->flash('error', 'Error saving content');
        }

    }

    public function destroy(Request $request, $id) {

        $content = Content::findOrFail($id);

        if ($content->delete($id)) {
            $request->session()->flash('success', 'Content deleted');
            return redirect('content');
        }
        else {
            $request->session()->flash('error', 'Error deleting content');
        }

    }

}
