@extends('cms.layouts.main')

@section('title', 'Editing a file')

@section('header', 'Editing a file')

@section('buttons')
	@include('cms.shared._buttons', ['label' => 'Save'])
@endsection

@section('content')

<form id="file-edit-form" class="ui form edit" action="/cms/files/{{ $file->id }}" method="post" enctype="multipart/form-data">

	{{ method_field('PATCH') }}

	@include('cms.file._form_edit')

</form>

@endsection
