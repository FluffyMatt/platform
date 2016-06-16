@extends('layouts.cms')

@section('title', 'Editing a category')

@section('header', 'Edit category')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/categories" method="post">

	@include('categories._form')

</form>

@endsection
