@extends('layouts.cms')

@section('title', 'Adding new '.$type)

@section('header', 'Add '.$type)

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
