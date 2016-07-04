@extends('cms.layouts.main')

@section('title', 'Editing a menu')

@section('header', 'Edit menu')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

	<form class="ui form" action="/cms/menus/{{ $menu->id }}" method="POST">

		{{ method_field('PATCH') }}

		@include('cms.menus._form')

	</form>

@endsection
