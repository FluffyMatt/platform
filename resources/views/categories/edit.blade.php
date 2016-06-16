@extends('layouts.cms')

@section('title', 'Editing a category')

@section('header', 'Editing a category')

@section('content')

<form class="ui form" action="/categories" method="post">

	@include('categories._form')

</form>

@endsection
