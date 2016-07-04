@extends('cms.layouts.main')

@section('title', 'Adding new menu')

@section('header', 'Add menu')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

	<form class="ui form" action="/cms/menus" method="post">

		@include('cms.menus._form')

	</form>

@endsection
