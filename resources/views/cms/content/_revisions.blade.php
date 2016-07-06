<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui accordion padded segment">

				<div class="title">
					<h3 class="ui centered header"><i class="history icon"></i>{{ count($revisions) }} Revisions</h3>
				</div>

				<div class="content">
					@foreach($revisions as $revision)
						<div class="ui vertical segment">
							<b>{{ ucfirst($revision->fieldName()) }}</b> changed by <b>{{ $revision->userResponsible()->full_name }}</b> {{ $revision->created_at->diffForHumans() }} (<a href="/cms/content/revision/{{ $revision->id }}">{{ $revision->created_at->toDayDateTimeString() }}</a>)
						</div>
					@endforeach
				</div>

			</div>

		</div>

	</div>

</div>
