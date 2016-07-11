@extends('cms.layouts.main')

@section('title', 'File index')

@section('header', 'Files')

@section('buttons')
	<a class="ui primary right floated button" href="/cms/files/create">Upload a File</a>
@endsection

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>Filename</th>
				<th>Title</th>
				<th>Type</th>
				<th>Size</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($files as $file)
				<tr>
					<td>
						{{ $file->filename }}
					</td>
					<td>
						{{ $file->title }}
					</td>
					<td>
						{{ $file->type }}
					</td>
					<td>
						{{ $file->size }}
					</td>
					<td>
						<div class="ui teal buttons">
							<a class="ui button" href="/cms/files/{{ $file->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon small button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item delete-confirm">
										<form action="/cms/files/{{ $file->id }}" method="POST">
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
