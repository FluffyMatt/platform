@extends('layouts.cms')

@section('title', 'Adding new content')

@section('header', 'Add content')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
