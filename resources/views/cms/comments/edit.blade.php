@extends('cms.layouts.main')

@section('title', 'Editing comment')

@section('header', 'Edit comment')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form id="content-form" class="ui form" action="/cms/comments/{{ $comment->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('cms.comments._form')

</form>

@endsection
