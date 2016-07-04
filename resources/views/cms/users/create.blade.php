@extends('cms.layouts.main')

@section('title', 'Create User')

@section('header', 'Create User')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

    <form class="ui form" action="/cms/users" method="POST">

        @include('cms.users._form')

    </form>

@endsection
