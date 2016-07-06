<p>
	{!! nl2br($comment->message) !!}
</p>
<p>
	<b><a href="/cms/users/{{ $comment->user_id }}">{{ $comment->user->full_name }}</a></b><br>
	<small>{{ $comment->created_at->format('j M Y - h:m') }}</small>
</p>
