@extends('layouts.admin')

@section('title', 'Adding new content')

@section('header', 'Add new content')

@section('content')

<form class="ui form" action="/content" method="post">

	{{ csrf_field() }}

	<div class="ui grid">

		<div class="eleven wide column">

			<div class="field">
				<label for="title">Title</label>
				<input type="text" name="title" value="">
			</div>

			<div class="field">
				<label for="description">Description</label>
				<textarea name="description" value="" rows="2"></textarea>
			</div>

			<div class="field">
				<label for="slug">URL</label>
				<input type="text" name="slug" value="">
			</div>

			<div class="field">
				<label for="body">Body</label>
				<input type="textarea" name="body" value="">
			</div>

			@include('.shared._seo')

		</div>

		<div class="five wide column">

			<div class="field">
				<label for="status">Status</label>
				<select class="ui fluid dropdown" name="status" id="status">
					<option value="draft" selected>Draft</option>
					<option value="published">Published</option>
				</select>
			</div>

			<div class="field">
				<label><i class="calendar icon"></i> Publish date</label>
				<div class="ui calendar">
		            <input name="published_at" type="text" value="{{ old('published_at', @$content->published_at) }}" placeholder="">
		        </div>
			</div>

		</div>

	</div>

	@include('shared._buttons')

</form>

@endsection
