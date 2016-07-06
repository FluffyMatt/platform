{{ csrf_field() }}

<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui padded segment">

				<div id="content-title" class="field">
					<label for="title">User</label>
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
