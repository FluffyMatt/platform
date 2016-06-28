@extends('layouts.cms')

@section('title', 'Editing a menu')

@section('header', 'Edit menu')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

	<form class="ui form" action="/menus/{{ $menu->id }}" method="POST">

		{{ method_field('PATCH') }}

		@include('menus._form')

	</form>

@endsection
