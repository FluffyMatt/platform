{{ csrf_field() }}

<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">
			<div class="ui padded segment">

			<div class="field">
				<label for="title">Title</label>
				<input type="text" name="title" value="{{ old('title', @$category->title) }}">
			</div>

			<div class="field">
				<label for="slug">URL</label>
				<input type="text" name="slug" value="{{ old('slug', @$category->slug) }}">
			</div>

			</div>
		</div>


	</div>

	<div class="five wide column">

		<div class="ui segments">
			<div class="ui padded segment">

			<div class="field">
				<label for="parent_id">Parent</label>
				<select class="ui fluid search dropdown parent" name="parent_id"></select>
			</div>

			</div>
		</div>

	</div>

</div>
