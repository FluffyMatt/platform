@extends('layouts.cms')

@section('title', "Reviewing revision $id")

@section('header', "Reviewing revision $id")

@section('buttons')
	<a href="/content/rollback/{{$id}}" class="ui primary right floated button">Restore</a>
@endsection

@section('content')

	<p><a href="/content/{{ $revision->revisionable_id }}/edit">Back to content</a></p>
	<h3 class="ui header">{{ ucfirst($revision->fieldName()) }}</h3>
	<div class="ui two column very relaxed grid">
		<div class="column">
			{{ $revision->oldValue() }}
		</div>
		<div class="column">
			{{ $revision->newValue() }}
		</div>
	</div>

@endsection
