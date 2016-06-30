{{ csrf_field() }}

<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui padded segment">

				<div id="content-title" class="field">
					<label for="title">Title</label>
					<input type="text" name="title" value="{{ old('title', @$content->title) }}">
				</div>

				<div id="content-description" class="field">
					<label for="description">Description</label>
					<textarea name="description" rows="2">{{ old('description', @$content->description) }}</textarea>
				</div>

				<div id="content-slug" class="field">
					<label for="slug">URL</label>
					<div class="ui labeled input">
						<div class="ui label">
							{{ ENV('APP_URL') }}/
						</div>
						<input type="text" name="slug" value="{{ old('slug', @$content->slug) }}">
					</div>
				</div>

				<div id="content-body" class="field">
					<label for="body">Body</label>
					<textarea name="body">{{ old('body', @$content->body) }}</textarea>
				</div>

			</div>

		</div>

		@include('content._fields_seo')

	</div>

	<div class="five wide column">

		<div class="ui segments">

			<div class="ui padded segment">

			<div id="content-type" class="field hide">
				<label for="type">Type</label>
				<select class="ui fluid dropdown" name="type">
					<option value=""></option>
					@foreach ($options['types'] as $type)
						<option value="{{ $type }}" @if(old('type', @$content->type) == $type) selected @endif>{{ ucfirst($type) }}</option>
					@endforeach
				</select>
			</div>

			<div id="content-status" class="field">
				<label for="status">Status</label>
				<select class="ui fluid dropdown" name="status">
					<option value="draft" @if(old('status', @$content->status) == 'draft') selected @endif >Draft</option>
					<option value="published" @if(old('status', @$content->status) == 'published') selected @endif >Published</option>
				</select>
			</div>

			<div id="content-published-at" class="field">
				<label><i class="calendar icon"></i> Publish date</label>
				<div class="ui calendar">
					<input accept=""name="published_at" type="text" value="{{ old('published_at', @$content->published_at) }}" placeholder="">
				</div>
			</div>

			<div id="content-users" class="field">
				<label for="users">Authored by</label>
				<select name="users[]" class="ui fluid search dropdown authors" multiple>
					@foreach ($options['users'] as $full_name => $id)
						<?php $selected = ''; ?>
						@foreach (old('users', @$content->users()->pluck('user_id')) as $user_id)
							@if ($user_id == $id)
								<?php $selected = 'selected'; ?>
							@endif
						@endforeach
						@if (empty(old('users', @$content->users->toArray())) && Auth::user()->id == $id)
							<?php $selected = 'selected'; ?>
						@endif
						<option value="{{ $id }}" {{ $selected }}>{{ $full_name }}</option>
					@endforeach
				</select>
			</div>

			<div id="content-categories" class="field">
				<label for="categories">Categories</label>
				<select name="categories[]" class="ui fluid search dropdown" multiple>
					<option value=""></option>
					@foreach ($options['categories'] as $id => $title)
						<?php $selected = ''; ?>
						@foreach (old('categories', @$content->categories()->pluck('category_id')) as $category_id)
							@if ($category_id == $id)
								<?php $selected = 'selected'; ?>
							@endif
						@endforeach
						<option value="{{ $id }}" {{ $selected }}>{{ $title }}</option>
					@endforeach
				</select>
			</div>

			</div>

		</div>

	</div>

</div>
