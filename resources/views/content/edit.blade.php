@extends('layouts.admin')

@section('title', 'Editing content')

@section('header', 'Editing content')

@section('content')

<form class="ui form" action="/content" method="post">

	@include('content._form')

</form>

@endsection
