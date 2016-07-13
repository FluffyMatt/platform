@extends('cms.layouts.main')

@section('title', 'File index')

@section('header', 'Files')

@section('buttons')
	<div class="ui primary right floated buttons">
		<a class="ui button" href="/cms/files/create">Upload Files</a>
		<div class="ui floating dropdown icon button">
			<i class="dropdown icon"></i>
			<div class="menu">
				<div class="item"><a href="/cms/files/create/photo">Upload Photos</a></div>
				<div class="item"><a href="/cms/files/create/user">Upload Users</a></div>
				<div class="item"><a href="/cms/files/create/feature">Upload Features</a></div>
				<div class="item"><a href="/cms/files/create/screenshot">Upload Screenshots</a></div>
				<div class="item"><a href="/cms/files/create/logo">Upload Logos</a></div>
				<div class="item"><a href="/cms/files/create/document">Upload Documents</a></div>
				<div class="item"><a href="/cms/files/create/audio">Upload Audio</a></div>
			</div>
		</div>
	</div>
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
						{{ $file->filename.$file->extension }}
					</td>
					<td>
						{{ $file->title }}
					</td>
					<td>
						{{ ucfirst($file->type) }}
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
