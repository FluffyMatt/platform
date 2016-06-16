@extends('layouts.cms')

@section('title', 'Create User')

@section('content')

    <h1 class="ui dividing header">Create user</h1>

    <form class="ui form" action="/users" method="POST">

        @include('users._form')

    </form>

@endsection
