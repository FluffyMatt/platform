@extends('cms.layouts.main')

@section('title', 'Editing a category')

@section('header', 'Edit category')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/cms/categories/{{ $category->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('cms.categories._form')

</form>

@endsection
