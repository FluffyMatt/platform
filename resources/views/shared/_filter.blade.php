<form action="" method="get">

	<div class="ui menu">

		@if(isset($filters['search']))

			<div class="ui item">
		      <select class="ui search dropdown" name="{{$filters['search']['name']}}">
				  <option value="">Select user</option>
				  @foreach($filters['search']['data'] as $key => $value)
					  <option value="{{$value->id}}" @if(app('request')->input($filters['search']['name']) == $value->id) selected @endif>{{$value->name}}</option>
				  @endforeach

			  </select>
		    </div>

		@endif

		@if($filters)

			@foreach ($filters as $element => $value)

				@if($element !== 'search')

					<div class="item">
						<div class="ui input selection dropdown">
							<input type="hidden" name="{{$element}}" value="{{app('request')->input($element)}}">
							<i class="dropdown icon"></i>
							<div class="default text">{{ucfirst($element)}}</div>
							<div class="menu">
								@foreach($value as $key => $value)

									<div class="item" data-value="{{$key}}">{{$value}}</div>

								@endforeach
							</div>
						</div>
					</div>

				@endif

			@endforeach

		@endif

	<div class="right item">
		<button class="ui primary button">Filter</button>
	</div>

	</div>

</form>
