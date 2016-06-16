@extends('layouts.cms')

@section('title', 'Content index')

@section('header', 'Content index')

@section('content')

	<div class="buttons">
		<a class="ui primary right floated button" href="/content/create">Add New</a>
	</div>

	<table class="ui celled table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Status</th>
				<th>Created</th>
				<th>Published</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($allContent as $content)
				<tr>
					<td>
						{{ $content->id }}
					</td>
					<td>
						{{ $content->status }}
					</td>
					<td>
						{{ $content->created_at }}
					</td>
					<td>
						{{ $content->published_at }}
					</td>
					<td>
						<div class="ui teal buttons">
							<a class="ui button" href="/content/{{ $content->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon small button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item">
										<form action="/content/{{ $content->id }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<div class="item">
												<button class="confirm-delete ui basic red button"><i class="delete icon"></i> Delete</button>
											</div>
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
