@if ($level==0)
	@include('cms.categories._index_row')
@endif

<?php $level++; ?>

@foreach ($category->children as $category)

	@include('cms.categories._index_row')

	@include('cms.categories._index_loop')

@endforeach
