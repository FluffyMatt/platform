<?php $author_count = count($content->users); ?>

@if ($content->type == 'article' and $author_count > 0)
	<p>
		{{ str_plural('Author', $author_count) }}
	</p>
	@foreach ($content->users as $user)
		{{ $user->full_name }}<br>
	@endforeach
@endif
