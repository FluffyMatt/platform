{{ csrf_field() }}

<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">
			<div class="ui padded segment">

			<div class="field">
				<label for="title">Title</label>
				<input type="text" name="title" value="{{ old('title', @$menu->title) }}">
			</div>

			<div class="field">
				<label for="slug">Slug</label>
				<input type="text" name="slug" value="{{ old('slug', @$menu->slug) }}">
			</div>

			</div>
		</div>

	</div>

	<div class="five wide column">

		<div class="ui segments">

			<div class="ui padded secondary segment">
				<h2>Menu links</h2>
			</div>
			<div class="ui padded segment">
				
			</div>
		</div>

	</div>

</div>
