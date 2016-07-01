@extends('cms.layouts.main')

@section('title', 'Menus')

@section('header', 'Menus')

@section('buttons')
	<a class="ui primary right floated button" href="/cms/menus/create">Add New</a>
@endsection

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($menus as $menu)
				<tr>
					<td>
						{{ $menu->id }}
					</td>
					<td>
						{{ $menu->title }}
					</td>
					<td>
						{{ $menu->slug }}
					</td>
					<td>
						<div class="ui teal small buttons">
							<a class="ui button" href="/menus/{{ $menu->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item">
										<form action="/menus/{{ $menu->id }}" method="POST">
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
