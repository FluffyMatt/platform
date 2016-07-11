<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use App\Comment;
use App\Category;
use App\User;
use App\Http\Requests;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
	public function home()
	{
		return view ('site.home');
	}

	public function show($slug)
	{
		$content = Content::where('slug', $slug)->firstOrFail();

		return view('site.content.show', compact('content'));
	}

    public function index(FilterRequest $request)
    {
        $titles = Content::distinct('title')->pluck('title', 'title');

        $filters = ['title' => $titles];

        $allContent = Content::orderBy('created_at', 'desc')->paginate(15);

        return view('cms.content.index', ['allContent' => $allContent, 'filters' => $filters]);
    }


    public function create($type = null)
    {
		if (in_array($type, Content::types)) {
			$content = new Content();
			$content->type = $type;
			$content->seo_index = 1;

			if ($type == 'page') {
				$content->commentable = false;
			} else {
				$content->commentable = true;
			}

	        $options = $this->options();

	        return view('cms.content.create', compact('content', 'options', 'type'));
		} else {
			abort(404);
		}
    }

    public function store(ContentRequest $request)
    {
        if ($content = Content::create($request->all())) {
            $content->users()->sync($request->input('users', []));
            $content->categories()->sync($request->input('categories', []));
			if (!empty($request->input('comment.message'))) {
				$note = new Comment($request->input('comment'));
				$content->notes()->save($note);
			}
            $request->session()->flash('success', 'Content saved successfully');
            return redirect('cms/content/'.$content->id.'/edit');
        } else {
            $request->session()->flash('error', 'Error saving content');
            return redirect('cms/content/create')->withInputs($request->all());
        }
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);

        $options = $this->options();

        $revisions = $content->revisionHistory()->orderBy('created_at', 'desc')->get();

        return view('cms.content.edit', compact('content', 'options', 'revisions'));
    }

    public function update(ContentRequest $request, $id)
    {
        $content = Content::findOrFail($id);

        if ($content->update($request->all())) {
            $content->users()->sync($request->input('users', []));
            $content->categories()->sync($request->input('categories', []));
			if (!empty($request->input('comment.message'))) {
				$note = new Comment($request->input('comment'));
				$content->notes()->save($note);
			}
            $request->session()->flash('success', 'Content saved successfully');
            return redirect('cms/content/'.$id.'/edit');
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
            return redirect('cms/content');
        } else {
            $request->session()->flash('error', 'Error deleting content');
        }
    }

    public function revision($id)
    {
        $revision = \Venturecraft\Revisionable\Revision::find($id);

        return view('cms.content.revision_view', compact('id', 'revision'));
    }

    public function rollback(Request $request, $id)
    {
        $revision = \Venturecraft\Revisionable\Revision::find($id);
        $content = Content::findOrFail($revision->revisionable_id);

        $data[$revision->fieldName()] = $revision->oldValue();

        if ($content->update($data)) {
            $request->session()->flash('success', 'Revision has been restored');
            return redirect('cms/content/'.$revision->revisionable_id.'/edit');
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
