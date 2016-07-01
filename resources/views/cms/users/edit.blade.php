@extends('cms.layouts.main')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('buttons')
	@include('cms.shared._buttons')
@endsection

@section('content')

    <form class="ui form" action="/users/{{ $user->id }}" method="POST">

		{{ method_field('PATCH') }}

        @include('cms.users._form')

    </form>

@endsection
