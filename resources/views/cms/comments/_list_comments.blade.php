<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui accordion padded segment">

				<div class="title">
					<h3 class="ui centered header">
						<i class="comments icon"></i>
						{{ count($content->comments) }} {{ str_plural('Comment', count($content->comments)) }}
					</h3>
				</div>

				<div class="content">
					@foreach($content->comments as $comment)
						<div class="ui vertical segment">
							@include('cms.comments._show')
						</div>
					@endforeach
				</div>

			</div>

		</div>

	</div>

</div>
