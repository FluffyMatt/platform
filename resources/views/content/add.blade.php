@extends('layouts.cms')

@section('title', 'Adding new content')

@section('header', 'Add new content')

@section('content')

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
