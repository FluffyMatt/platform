@extends('layouts.cms')

@section('title', 'Create User')

@section('header', 'Create User')

@section('buttons')
	@include('shared._buttons')
@endsection

@section('content')

    <form class="ui form" action="/users" method="POST">

        @include('users._form')

    </form>

@endsection
