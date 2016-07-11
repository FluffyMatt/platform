<input type="hidden" name="comment[status]" value="private">

<input type="hidden" name="comment[user_id]" value="{{ Auth::user()->id }}">

<div id="content-note" class="field">
	<label for="comment[message]">Leave a new note</label>
	<textarea name="comment[message]"></textarea>
</div>
