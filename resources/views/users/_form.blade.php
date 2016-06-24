@include('shared._errors')

{{ csrf_field() }}

<div class="ui segments">
	<div class="ui padded segment">

		<div class="required field">
			<label>First name</label>
			<input name="first_name" type="text" value="{{ old('first_name', @$user->first_name) }}">
		</div>

		<div class="required field">
			<label>Last name</label>
			<input name="last_name" type="text" value="{{ old('last_name', @$user->last_name) }}">
		</div>

		<div class="required field">
			<label>Email</label>
			<input name="email" type="text" value="{{ old('email', @$user->email) }}">
		</div>

		<div class="required field">
			<label>Username</label>
			<input name="username" type="text" value="{{ old('username', @$user->username) }}">
		</div>

		<div class="inline field">
		  	<div class="ui toggle checkbox">
		  		<input name="admin" type="checkbox" value="1" tabindex="0" class="hidden" {{ old('admin', @$user->admin) == '1' ? 'checked' : '' }}>
				<label>Admin</label>
		  	</div>
		</div>

		<div class="inline field">
		  	<div class="ui toggle checkbox">
		  		<input name="editor" type="checkbox" value="1" tabindex="0" class="hidden" {{ old('editor', @$user->editor) == '1' ? 'checked' : '' }}>
				<label>Editor</label>
		  	</div>
		 </div>

		<div class="inline field">
		  	<div class="ui toggle checkbox">
		  		<input name="author" type="checkbox" value="1" tabindex="0" class="hidden" {{ old('author', @$user->author) == '1' ? 'checked' : '' }}>
				<label>Author</label>
		  	</div>
		</div>
		
	</div>
