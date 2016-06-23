@if ($level==0)
	@include('categories._index_row')
@endif

<?php $level++; ?>

@foreach ($category->children as $category)

	@include('categories._index_row')

	@include('categories._index_loop')

@endforeach
