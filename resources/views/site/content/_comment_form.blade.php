<form id="comment-form" class="ui reply form" action="/comments" method="post">

	{{ csrf_field() }}

	<input type="hidden" name="content_id" value="{{ $content->id }}">

	<div id="comment-message" class="field">
		<textarea name="message" class="inactive"></textarea>
	</div>

	<button id="save" class="ui blue labeled submit icon button">
		<i class="icon edit"></i> Post comment
	</button>

</form>
