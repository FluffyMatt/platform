@include('shared._errors')

{{ csrf_field() }}

<div class="ui segments">
	<div class="ui padded segment">

		<div class="required field">
			<label>Name</label>
			<input name="name" type="text" value="{{ old('name', @$user->name) }}">
		</div>

		<div class="required field">
			<label>Email</label>
			<input name="email" type="text" value="{{ old('email', @$user->email) }}">
		</div>

		<div class="required field">
			<label>Username</label>
			<input name="username" type="text" value="{{ old('username', @$user->username) }}">
		</div>

		<div class="required field">
			<label>Password</label>
			<input name="password" type="text" value="{{ old('password', @$user->password) }}">
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

	<div class="ui secondary clearing padded segment">
		<button class="ui primary right floated large button">Submit</button>
	</div>

</div>
