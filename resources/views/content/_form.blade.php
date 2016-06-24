{{ csrf_field() }}

<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui padded segment">

				<div class="field">
					<label for="title">Title</label>
					<input type="text" name="title" value="{{ old('title', @$content->title) }}">
				</div>

				<div class="field">
					<label for="description">Description</label>
					<textarea name="description" rows="2">{{ old('description', @$content->description) }}</textarea>
				</div>

				<div class="field">
					<label for="slug">URL</label>
					<input type="text" name="slug" value="{{ old('slug', @$content->slug) }}">
				</div>

				<div class="field">
					<label for="body">Body</label>
					<textarea type="textarea" name="body" >{{ old('body', @$content->body) }}</textarea>
				</div>

			</div>

		</div>

		@include('content._fields_seo')

	</div>

	<div class="five wide column">

		<div class="ui segments">

			<div class="ui padded segment">

			<div class="field">
				<label for="status">Status</label>
				<select class="ui fluid dropdown" name="status" id="status">
					<option value="draft" @if(old('status', @$content->status) == 'draft') selected @endif >Draft</option>
					<option value="published" @if(old('status', @$content->status) == 'published') selected @endif >Published</option>
				</select>
			</div>

			<div class="field">
				<label><i class="calendar icon"></i> Publish date</label>
				<div class="ui calendar">
					<input name="published_at" type="text" value="{{ old('published_at', @$content->published_at) }}" placeholder="">
				</div>
			</div>

			<div class="field">
				<label for="users">Authors</label>
				<select name="users[]" class="ui fluid search dropdown authors" multiple>
					@if(old('status', @$content->users))
						@foreach($content->users as $user)
							<option selected value="{{ $user->id }}">{{ $user->full_name }}</option>
						@endforeach
					@endif
				</select>
			</div>

			<div class="field">
				<label for="categories">Categories</label>
				<select name="categories[]" class="ui fluid search dropdown" multiple>
					<option value=""></option>
					@foreach ($options['categories'] as $id => $title)
						<?php $selected = ''; ?>
						@if (old('categories', @$content->categories))
							@foreach (old('categories', @$content->categories) as $category)
								@if ($category->id == $id)
									<?php $selected = 'selected'; ?>
								@endif
							@endforeach
						@endif
						<option value="{{ $id }}" {{ $selected }}>{{ $title }}</option>
					@endforeach
				</select>
			</div>

			</div>

		</div>

	</div>

</div>
