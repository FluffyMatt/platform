@if($total > 1)

	<div class="ui pagination menu">

		@for($i=1; $i <= $total ; $i++)

			@if($i == $current)
				<a class="active item">{{ $i }}</a>
			@else
				<a class="item" href="?page={{ $i }}">{{ $i }}</a>
			@endif

		@endfor

	</div>

@endif
