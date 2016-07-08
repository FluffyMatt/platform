<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(15);

        return view('cms.comments.index', compact('comments'));
    }

    public function create()
    {
        $comment = Comment::findOrFail($id);

		$options = $this->options();

        return view('cms.comments.edit', compact('comment', 'options'));
    }

    public function store(CommentRequest $request)
    {
        $comment = new Comment($request->all());
		$comment->user_id = Auth::user()->id;
		if (!$comment->status) {
			$comment->status = 'approved';
		}

        if ($comment->save()) {
            $request->session()->flash('success', 'Comment saved successfully');
			if ($comment->status=='private') {
	            return redirect('cms/content/'.$content->id.'/edit');
			} else {
				return redirect('/'.$comment->content->slug);
			}
        } else {
            $request->session()->flash('error', 'Error saving comment');
        }
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

		$options = $this->options();

        return view('cms.comments.edit', compact('comment', 'options'));
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->update($request->all())) {
            $request->session()->flash('success', 'Comment saved successfully');
            return redirect('cms/comments/'.$id.'/edit');
        } else {
            $request->session()->flash('error', 'Error saving comment');
        }
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->delete($id)) {
            $request->session()->flash('success', 'Comment deleted');
            return redirect('cms/comments');
        } else {
            $request->session()->flash('error', 'Error deleting comment');
        }
    }

	public function options()
	{
		return [
			'status' => Comment::status
		];
	}
}
