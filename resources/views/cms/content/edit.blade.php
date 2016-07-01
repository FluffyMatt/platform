@extends('cms.layouts.main')

@section('title', 'Editing '.$type)

@section('header', 'Edit '.$type)

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form id="content-form" class="ui form" action="/content/{{ $content->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('cms.content._form')

	@include('cms.content._revisions')

</form>

@endsection
