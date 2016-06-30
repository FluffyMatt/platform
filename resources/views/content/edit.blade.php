@extends('layouts.cms')

@section('title', 'Editing '.$type)

@section('header', 'Edit '.$type)

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content/{{ $content->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('content._form')

	@include('content._revisions')

</form>

@endsection
