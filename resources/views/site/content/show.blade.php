@extends('site.layouts.main')

@section('title', $content->seo_title)

@section('header', $content->title)

@section('content')

	{!! $content->body !!}

@endsection
