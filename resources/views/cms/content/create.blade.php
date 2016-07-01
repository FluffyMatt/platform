@extends('cms.layouts.main')

@section('title', 'Adding new '.$type)

@section('header', 'Add '.$type)

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form id="content-form" class="ui form" action="/content" method="post">

	@include('cms.content._form')

</form>

@endsection
