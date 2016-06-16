@extends('layouts.cms')

@section('title', 'Editing a category')

@section('content')

<h1 class="ui dividing header">Edit category</h1>

<form class="ui form" action="/categories" method="post">

	@include('categories._form')

</form>

@endsection
