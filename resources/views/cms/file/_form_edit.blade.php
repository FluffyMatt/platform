{{ csrf_field() }}

<div class="ui grid">

	<div class="ui seven wide column">

		<div class="ui centered card">
			<div class="ui image">
				@if(in_array($file->mime, $types))
					<img src="{{ $file->path.$file->filename.'-medium'.$file->extension }}">
				@else
					<i class="file centered icon outline huge"></i>
				@endif
			</div>
			<div class="content">
				<p class="header">{{ $file->filename.$file->extension }}</p>
				<div class="meta">
				  <span class="date">{{ $file->created_at->toDayDateTimeString() }}</span>
				</div>
			</div>
			<div class="extra content">
				<a>
					<i class="upload icon"></i>
					@if(in_array($file->mime, $types))
						<label for="file">Replace image</label>
					@else
						<label for="file">Replace file</label>
					@endif
					<input id="file" type="file" name="file" class="hide">
				</a>
			</div>
		</div>

	</div>

	<div class="ui seven wide column">

		<div class="ui segments">

			<div class="ui padded segment">

				<h3 class="ui centered header"><i class="info icon"></i> Attributes</h3>

				<div class="field">
					<label for"title">Title</label>
					<input type="text" name="title" value="{{ old('title', @$file->title) }}">
				</div>

				<div class="field">
					<label for"title">Alt text</label>
					<input type="text" name="alt_text" value="{{ old('title', @$file->alt_text) }}">
				</div>

			</div>

		</div>

		<div class="ui segments">

			<div class="ui padded segment">

				<h3 class="ui centered header"><i class="copyright icon"></i> Creative Commons</h3>

				<div class="field">
					<label for"title">Credit name</label>
					<input type="text" name="credit_name" value="{{ old('title', @$file->credit_name) }}">
				</div>

				<div class="field">
					<label for"title">Credit url</label>
					<input type="text" name="credit_url" value="{{ old('title', @$file->credit_url) }}">
				</div>

			</div>

		</div>

	</div>

</div>
