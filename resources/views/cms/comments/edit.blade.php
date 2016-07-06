@extends('cms.layouts.main')

@section('title', 'Editing comment')

@section('header', 'Edit comment')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

	<form id="content-form" class="ui form" action="/cms/comments/{{ $comment->id }}" method="POST">

		{{ method_field('PATCH') }}

		{{ csrf_field() }}

		<div class="ui grid">

			<div class="eleven wide column">

				<div class="ui segments">

					<div class="ui padded segment">

						<div id="content-title" class="field">
							<label>Content</label>
							<a href="/cms/content/{{ $comment->content->id }}/edit">{{ $comment->content->title }}</a>
						</div>

						<div id="content-user" class="field">
							<label>User</label>
							<a href="/cms/users/{{ $comment->user_id }}/edit">{{ $comment->user->full_name }}</a>
						</div>

						<div id="comment-message" class="field">
							<label for="message">Message</label>
							<textarea name="message" rows="10">{{ old('message', @$comment->message) }}</textarea>
						</div>

					</div>

				</div>

			</div>

			<div class="five wide column">

				<div class="ui segments">

					<div class="ui padded segment">

						<div id="comment-status" class="field">
							<label for="status">Status</label>
							<select class="ui fluid dropdown" name="status">
								@foreach ($options['status'] as $status)
									<option value="{{ $status }}" @if(old('type', @$content->status) == $status) selected @endif>{{ ucfirst($status) }}</option>
								@endforeach
							</select>
						</div>

					</div>

				</div>

			</div>

		</div>


	</form>

@endsection
