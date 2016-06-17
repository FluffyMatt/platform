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

		@include('.shared._seo')

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
				<select class="ui fluid search dropdown authors" multiple="" name="users[]">
					@if(old('status', @$content->users))
						@foreach($content->users as $user)
							<option selected value="{{ $user->id }}">{{ $user->full_name }}</option>
						@endforeach
					@endif
				</select>
			</div>

			<div class="field">
				<label for="categories">Categories</label>
				<select class="ui fluid search dropdown categories" multiple="" name="categories[]"></select>
				@if(old('status', @$content->categories))
					@foreach($content->categories as $category)
						<option selected value="{{ $category->id }}">{{ $category->title }}</option>
					@endforeach
				@endif
			</div>

			</div>

		</div>

	</div>

</div>
