<form action="" method="get">

	<div class="ui segment">

		@if(isset($filters['search']))

			<div class="field">
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

					<div class="field">
						<label for="{{$element}}">{{ucfirst($element)}}</label>
						<div class="ui selection dropdown" title="{{ucfirst($element)}}">
							<input type="hidden" name="{{$element}}" value="{{app('request')->input($element)}}">
							<i class="dropdown icon"></i>
							<div class="default text">{{ucfirst($element)}}</div>
							<div class="menu">
								<div class="header">
									Filter by {{$element}}
								</div>
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
		<button class="ui button">Filter</button>
	</div>

	</div>

</form>
