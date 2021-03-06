@extends('cms.layouts.main')

@section('title', 'Category index')

@section('header', 'Categories')

@section('buttons')
	<a class="ui primary right floated button" href="/cms/categories/create">Add New</a>
@endsection

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($categories as $category)

				<?php $level = 0; ?>

				@include('cms.categories._index_loop')

			@empty
				<tr>
					<td colspan="100%">
						<p class="center align">No data</p>
					</td>
				</tr>
			@endforelse
		</tbody>
	</table>

@endsection
