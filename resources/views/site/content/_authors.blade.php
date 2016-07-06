<?php $author_count = count($content->users); ?>

@if ($content->type == 'article' and $author_count > 0)
	<p>
		@if ($author_count > 0)
			Authors:
		@else
			Author:
		@endif
	</p>
	@foreach ($content->users as $user)
		{{ $user->full_name }}<br>
	@endforeach
@endif
