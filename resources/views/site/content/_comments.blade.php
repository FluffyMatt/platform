@if ($content->type == 'article')

	<?php $count = count($content->comments); ?>
	@if ($count > 0)

		<div class="ui section divider"></div>

		<div id="comments" class="ui comments">

			<h3 class="ui header">
				<i class="comments outline icon"></i>
				{{ $count }} {{ str_plural('Comment', $count) }}
			</h3>

			@if (Auth::user())
				@include('site.content._comment_form')
			@else
				<p>Please login to comment</p>
			@endif

			<div class="ui section divider"></div>

			@foreach ($content->comments as $comment)
				<div class="comment">
					<a class="avatar">
						<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=50&h=50">
					</a>
					<div class="content">
						<a class="author">{{ $comment->user->full_name }}</a>
						<div class="metadata">
							<span class="date">{{ $comment->created_at->format('j F Y \a\t g:ma') }}</span>
						</div>
						<div class="text">
							{!! nl2br($comment->message) !!}
						</div>
					</div>
				</div>
			@endforeach

		</div>

	@endif

@endif
