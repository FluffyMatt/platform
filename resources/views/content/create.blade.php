@extends('layouts.cms')

@section('title', 'Adding new content')

@section('content')

<h1 class="ui dividing header">Add content</h1>

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
