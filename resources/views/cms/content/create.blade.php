@extends('cms.layouts.main')

@section('title', 'Adding new '.$content->type)

@section('header', 'Add '.$content->type)

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content" method="post">

	@include('cms.content._form')

</form>

@endsection
