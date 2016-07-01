@extends('layouts.cms')

@section('title', "Reviewing revision")

@section('header', "Reviewing revision")

@section('buttons')
	<a href="/content/rollback/{{$id}}" class="ui primary right floated button">Restore</a>
	<a href="/content/{{ $revision->revisionable_id }}/edit" class="ui right floated button">Back</a>
@endsection

@section('content')
	<p>by <b>{{ $revision->userResponsible()->full_name }}</b> <br /> {{ $revision->created_at->diffForHumans() }} ({{ $revision->created_at->toDayDateTimeString() }})</p>
	<h3 class="ui header">{{ ucfirst($revision->fieldName()) }}</h3>
	<div id="revision" class="ui two column very relaxed grid">
		<div class="column">
			<pre id="old-diff">
				{{ $revision->oldValue() }}
			</pre>
		</div>

		<div class="column">
			<pre id="new-diff">
				{{ $revision->newValue() }}
			</pre>
		</div>
	</div>

	<script src="/js/jsdiff.min.js"></script>

@endsection
