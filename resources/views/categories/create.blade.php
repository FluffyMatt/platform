@extends('layouts.cms')

@section('title', 'Adding new category')

@section('header', 'Add category')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/categories" method="post">

	@include('categories._form')

</form>

@endsection
