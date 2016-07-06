@extends('cms.layouts.main')

@section('title', 'Editing '.$content->type)

@section('header', 'Edit '.$content->type)

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form id="content-form" class="ui form" action="/cms/content/{{ $content->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('cms.content._form')

	@include('cms.content._revisions')

	@include('cms.comments._list_notes')

	@if ($content->type == 'article')
		@include('cms.comments._list_comments')
	@endif

</form>

@endsection
