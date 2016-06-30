<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use App\Category;
use App\User;
use App\Http\Requests;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{

    public function index(FilterRequest $request)
    {
        $titles = Content::distinct('title')->pluck('title', 'title');

        $filters = ['title' => $titles];

        $allContent = Content::orderBy('created_at', 'desc')->paginate(15);

        return view('content.index', ['allContent' => $allContent, 'filters' => $filters]);
    }


    public function create($type = null)
    {
		if (in_array($type, Content::types)) {
			$content = new Content([
				'type' => $type,
	            'seo_index' => 1
	        ]);

	        $options = $this->options();

	        return view('content.create', compact('content', 'options'));
		} else {
			abort(404);
		}
    }

    public function store(ContentRequest $request)
    {
        if ($content = Content::create($request->all())) {
            $content->users()->sync($request->input('users', []));
            $content->categories()->sync($request->input('categories', []));
            $request->session()->flash('success', 'Content saved successfully');
            return redirect('content/'.$content->id.'/edit');
        } else {
            $request->session()->flash('error', 'Error saving content');
            return redirect('content/create')->withInputs($request->all());
        }
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);

        $options = $this->options();

        $revisions = $content->revisionHistory()->orderBy('created_at', 'desc')->get();

        return view('content.edit', compact('content', 'options', 'revisions'));
    }

    public function update(ContentRequest $request, $id)
    {
        $content = Content::findOrFail($id);

        if ($content->update($request->all())) {
            $content->users()->sync($request->input('users', []));
            $content->categories()->sync($request->input('categories', []));
            $request->session()->flash('success', 'Content saved successfully');
            return redirect('content/'.$id.'/edit');
        } else {
            $request->session()->flash('error', 'Error saving content');
        }
    }

    public function destroy(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        if ($content->delete($id)) {
            $content->users()->detach();
            $request->session()->flash('success', 'Content deleted');
            return redirect('content');
        } else {
            $request->session()->flash('error', 'Error deleting content');
        }
    }

    public function revision($id)
    {
        $revision = \Venturecraft\Revisionable\Revision::find($id);

        return view('content.revision_view', compact('id', 'revision'));
    }

    public function rollback($id)
    {
        $revision = \Venturecraft\Revisionable\Revision::find($id);
        $content = Content::findOrFail($revision->revisionable_id);

        $data[$revision->fieldName] = [$revision->oldValue()];

        if ($content->update($data)) {
            $content->users()->sync($content->users());
            $content->categories()->sync($content->categories());
            $request->session()->flash('success', 'Revision has been restored');
            return redirect('content/'.$revision->revisionable_id.'/edit');
        } else {
            $request->session()->flash('error', 'Revision failed to restore');
        }

    }

    public function options()
    {
        return [
            'categories' => Category::tree(),
			'types' => Content::types,
            'users' => User::all()->pluck('id', 'full_name'),
        ];
    }
}
