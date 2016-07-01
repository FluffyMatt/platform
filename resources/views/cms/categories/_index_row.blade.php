<tr>
	<td>
		{{ $category->id }}
	</td>
	<td>
		{{ AppHelper::indent($level) }} {{ $category->title }}
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
