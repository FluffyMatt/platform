@extends('layouts.cms')

@section('title', 'Category index')

@section('header', 'Categories')

@section('buttons')
	<a class="ui primary right floated button" href="/categories/create">Add New</a>
@endsection

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Parent</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($categories as $category)
				<tr>
					<td>
						{{ $category->id }}
					</td>
					<td>
						{{ $category->title }}
					</td>
					<td>
						@if ($category->parent)
							{{ $category->parent->title }}
						@endif
					</td>
					<td>
						<div class="ui teal small buttons">
							<a class="ui button" href="/categories/{{ $category->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item">
										<form action="/categories/{{ $category->id }}" method="POST">
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
