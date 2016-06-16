@extends('layouts.cms')

@section('title', 'Adding new category')

@section('header', 'Add new category')

@section('content')

<h1 class="ui dividing header">Add category</h1>

<form class="ui form" action="/categories" method="post">

	@include('categories._form')

</form>

@endsection
