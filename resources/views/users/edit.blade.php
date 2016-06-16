@extends('layouts.cms')

@section('title', 'Edit User')

@section('content')

    <h1 class="ui dividing header">Edit User</h1>

    <form class="ui form" action="/users/{{ $user->id }}" method="POST">

		{{ method_field('PATCH') }}

        @include('users._form')

    </form>

@endsection
