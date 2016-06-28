@extends('layouts.cms')

@section('title', 'Adding new menu')

@section('header', 'Add menu')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

	<form class="ui form" action="/menus" method="post">

		@include('menus._form')

	</form>

@endsection
