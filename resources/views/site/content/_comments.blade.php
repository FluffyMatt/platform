@if ($content->type == 'article')

	<?php $count = count($content->comments); ?>
	@if ($count > 0)

		<div class="divider"></div>

		<div id="comments">

			<h2>
				<i class="comments outline icon"></i>
				{{ $count }} {{ str_plural('Comment', $count) }}
			</h2>

			@foreach ($content->comments as $comment)
				<div class="ui fluid card">
					<div class="content">
						{!! nl2br($comment->message) !!}
					</div>
					<div class="extra content">
						<div class="left floated author">
							<img class="ui avatar image" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=50&h=50">
							<a href="/cms/users/{{ $comment->user_id }}">{{ $comment->user->full_name }}</a>
						</div>
						<div class="right floated time">
							<small>{{ $comment->created_at->format('j F Y h:m') }}</small>
						</div>
					</div>
				</div>
			@endforeach

		</div>

	@endif

@endif
