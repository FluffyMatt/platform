@extends('layouts.cms')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('content')

    <form class="ui form" action="/users/{{ $user->id }}" method="POST">

		{{ method_field('PATCH') }}

        @include('users._form')

    </form>

@endsection
