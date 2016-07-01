@extends('cms.layouts.main')

@section('title', 'Adding new category')

@section('header', 'Add category')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/categories" method="post">

	@include('cms.categories._form')

</form>

@endsection
