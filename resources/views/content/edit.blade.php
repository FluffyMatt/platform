@extends('layouts.cms')

@section('title', 'Editing content')

@section('content')

<h1 class="ui dividing header">Edit content</h1>

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
