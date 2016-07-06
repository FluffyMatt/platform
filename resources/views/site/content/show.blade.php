@extends('site.layouts.main')

@section('title', $content->seo_title)

@section('header', $content->title)

@section('content')

	<div class="ui grid">

		<div class="eleven wide column">
			{!! $content->body !!}
		</div>

		<div class="five wide column">
			@include('site.content._authors')
		</div>

	</div>

@endsection
