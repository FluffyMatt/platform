@extends('cms.layouts.main')

@section('title', 'Upload new file')

@section('header', 'Upload file')


@section('content')

<form id="file-form" class="ui form" action="/cms/files" method="post">

	@include('cms.file._form')

</form>

@endsection
