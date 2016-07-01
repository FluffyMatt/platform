@extends('cms.layouts.main')

@section('title', 'Users')

@section('header', 'Users')

@section('buttons')
	<a class="ui primary right floated button" href="/cms/users/create">Add New</a>
@endsection

@section('content')

	<table class="ui celled table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Admin</th>
				<th>Editor</th>
				<th>Author</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($users as $user)
				<tr>
					<td>
						{{ $user->id }}
					</td>
					<td>
						{{ $user->first_name }} {{ $user->last_name }}
					</td>
					<td>
						{{ $user->username }}
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td>
						{{ $user->admin ? 'Yes' : 'No' }}
					</td>
					<td>
						{{ $user->editor ? 'Yes' : 'No' }}
					</td>
					<td>
						{{ $user->author ? 'Yes' : 'No' }}
					</td>
					<td>
						<div class="ui teal small buttons">
							<a class="ui button" href="/users/{{ $user->id }}/edit">Edit</a>
							<div class="ui floating dropdown icon button">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item">
										<form action="/users/{{ $user->id }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
						                    <button class="confirm-delete ui basic red button"><i class="delete icon"></i> Delete</button>
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
