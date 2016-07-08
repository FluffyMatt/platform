<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui accordion padded segment">

				<div class="title">
					<h3 class="ui centered header">
						<i class="file outline icon"></i>
						{{ count($content->notes) }} {{ str_plural('Note', count($content->notes)) }}
					</h3>
				</div>

				<div class="content">

					@include('cms.comments._form_notes')

					@foreach($content->notes as $comment)
						<div class="ui vertical segment">
							@include('cms.comments._show')
						</div>
					@endforeach

				</div>

			</div>

		</div>

	</div>

</div>
