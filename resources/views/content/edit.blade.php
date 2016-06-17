@extends('layouts.cms')

@section('title', 'Editing content')

@section('header', 'Edit content')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content/{{ $content->id }}" method="POST">

	{{ method_field('PATCH') }}

	@include('content._form')

</form>

@endsection
