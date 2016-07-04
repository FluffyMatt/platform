@extends('cms.layouts.main')

@section('title', 'Content index')

@section('header', 'Content')

@section('buttons')
	<a class="ui primary right floated button" href="/cms/content/create/page">Add Page</a>
	<div class="ui primary right floated buttons">
	  <a class="ui button" href="/cms/content/create/article">Add Article</a>
	  <div class="ui floating dropdown icon button">
	    <i class="dropdown icon"></i>
	    <div class="menu">
		  <div class="item"><a href="/cms/content/create/series">Add Series</a></div>
	      <div class="item"><a href="/cms/content/create/chapter">Add Chapter</a></div>
	    </div>
	  </div>
	</div>
@endsection

@section('content')


	<table class="ui celled table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Type</th>
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
						{{ $content->title }}
					</td>
					<td>
						{{ $content->type }}
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
							<a class="ui button" href="/cms/content/{{ $content->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon small button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item delete-confirm">
										<form action="/cms/content/{{ $content->id }}" method="POST">
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
