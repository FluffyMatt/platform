{{ csrf_field() }}

<div class="ui grid">

	<div class="ui one column centered grid">

		<div class="ui upload thirteen wide column">
			<div class="ui segments">
				<div class="ui clearing segment">
					<span class="ui small header">Drag files on to the area below</span>
					<a class="ui right floated primary button button-upload">Add files</a>
				</div>
				<div class="ui secondary segment">
					<input id="file-upload" type="file" multiple="multiple" name="files[]" class="ui secondary segment" />
				</div>
			</div>
		</div>

	</div>

</div>

<table id="uploads" class="ui celled table hide">
	<thead>
		<tr>
			<th>Thumbnail</th>
			<th>Filename</th>
			<th>Format</th>
			<th>Size</th>
			<th>Action</a>
		</tr>
	</thead>
	<tbody>

	</tbody>
</table>
