@extends('cms.layouts.main')

@section('title', 'Comments')

@section('header', 'Comments')

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>User</th>
				<th>Content</th>
				<th>Type</th>
				<th>Status</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($comments as $comment)
				<tr>
					<td>
						{{ $comment->user->first_name }} {{ $comment->user->last_name }}
					</td>
					<td>
						{{ $comment->content->title }}
					</td>
					<td>
						{{ $comment->public }}
					</td>
					<td>
						{{ $comment->status }}
					</td>
					<td>
						{{ $comment->created_at }}
					</td>
					<td>
						<div class="ui teal buttons">
							<a class="ui button" href="/cms/comments/{{ $comment->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon small button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item delete-confirm">
										<form action="/cms/comments/{{ $comment->id }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<i class="delete red icon"></i> Delete
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
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
