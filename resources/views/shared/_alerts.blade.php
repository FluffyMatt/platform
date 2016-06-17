@if (Session::has('success'))
	<div class="ui success message">
	  <i class="close icon"></i>
	  {{Session::get('success')}}
	</div>
@elseif (Session::has('warning'))
	<div class="ui warning message">
	  <i class="close icon"></i>
	  {{Session::get('warning')}}
	</div>
@elseif (Session::has('error'))
	<div class="ui error message">
	  <i class="close icon"></i>
	  {{Session::get('error')}}
	</div>
@elseif (Session::has('info'))
	<div class="ui info message">
	  <i class="close icon"></i>
	  {{Session::get('info')}}
	</div>
@endif
