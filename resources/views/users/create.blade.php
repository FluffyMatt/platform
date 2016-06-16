@extends('layouts.cms')

@section('title', 'Create User')

@section('header', 'Create User')

@section('content')

    <form class="ui form" action="/users" method="POST">

        @include('users._form')

    </form>

@endsection
