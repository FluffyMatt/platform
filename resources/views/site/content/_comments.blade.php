@if ($content->type == 'article')

	<?php $count = count($content->comments); ?>
	@if ($count > 0)

		<div id="comments" class="ui segments">

			<div class="ui padded secondary segment">

				<h2>
					<i class="comments outline icon"></i>
					{{ $count }} {{ str_plural('Comment', $count) }}
				</h2>

			</div>

			@foreach ($content->comments as $comment)
				<div class="ui padded segment">
					<p>
						{!! nl2br($comment->message) !!}
					</p>
					<p>
						<b><a href="/cms/users/{{ $comment->user_id }}">{{ $comment->user->full_name }}</a></b><br>
						<small>{{ $comment->created_at->format('j M Y - h:m') }}</small>
					</p>
				</div>
			@endforeach

		</div>

	@endif

@endif
