@extends('layouts.cms')

@section('title', 'Editing content')

@section('header', 'Edit content')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
