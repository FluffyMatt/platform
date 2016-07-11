$(function() {

	// Ckeditor
	if ($('[name="body"]').length > 0) {
		CKEDITOR.replace('body', {
			skin: 'flat,/js/flat/',
			customConfig: '/js/ckeditor.js'
		})
	};

	// Save button located outside form can trigger submit
	$('#save').click(function() {
		$('.ui.form').submit();
	});

	// Confirm delete
	$('.item.delete-confirm').click(function() {
		$(this).children('form').submit();
	})

	// Slug generation
	var $generateSlug = true;
	if ($('#content-slug input').val().length > 0) {
		$generateSlug = false; // Don't generate if a slug is already set, e.g. editing exiting content title
	};
	$('#content-title input').on('keyup', function() {
		if ($('#content-slug input').val().length === 0) {
			$generateSlug = true; // If someone clears the existing slug, assume they want title edits to generate a slug
		}
		if ($generateSlug) {
			$(this).generateSlug(); // Generate slug from title
		}
	});
	$('#refresh-slug').click(function() {
		$('#content-title input').generateSlug();
		return false;
	});
	$.fn.generateSlug = function() {
		var slug = $(this).val();
		console.log('a')
		slug = slug.toLowerCase(); // Convert uppercase characters to lowercase
		slug = slug.replace(/[\W_]+/g, " "); // Replace non-alphanumeric and underscores with spaces
		slug = slug.trim(); // Replace whitespace at start and end
		slug = slug.replace(/\s+/g, "-"); // Replace spaces with hyphens
		$('#content-slug input').val(slug);
	}

	// Conditional fields
	$('#content-form').each(function() {
		$('#content-categories').dependsOn({
			'#content-type select': {
				not: ['page']
			}
		});
		$('#content-description').dependsOn({
			'#content-type select': {
				not: ['page']
			}
		});
	});

	// Semantic
	$('.ui.calendar').calendar({
		on: 'focus',
		ampm: false,
		formatter: {
			date: function (date, settings) {
				if (!date) return '';
				var day = ("0" + date.getDate()).slice(-2);
				var month = ("0" + (date.getMonth() + 1)).slice(-2);
				var year = date.getFullYear();
				return  + year + '-' + month + '-' + day;
			}
		},
		type: 'datetime'
	});

	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
	});

	$('.ui.dropdown').dropdown({on: 'hover'})
	$('form .ui.dropdown').dropdown({on: 'focus'})

	$('.ui.checkbox').checkbox();

	$('.ui.accordion').accordion();

	// Js Diff
	$("#old-diff").each(function(){
		var newVal = $('#new-diff').text();
		$('#new-diff').text('');
		var oldVal = $('#old-diff').text();
		$('#old-diff').text('');
		var diff = JsDiff.diffWords(oldVal, newVal);
		diff.forEach(function(part){
			var color = '';
			var append;
			if (part.added) {
				writeDiff(part, 'new-diff', 'added');
				//$('#new-diff').html($('#new-diff').html().replace(part.value, "<span class='added' style='color: #5cb85c;'>"+part.value+"</span>"));
			}
			else if (part.removed) {
				writeDiff(part, 'old-diff', 'removed');
				//$('#old-diff').html($('#old-diff').html().replace(part.value, "<span class='removed' style='color: #d9534f;'>"+part.value+"</span>"));
			} else {
				writeDiff(part, 'old-diff', '');
				writeDiff(part, 'new-diff', '');
			}
		});
	  });

	  function writeDiff(part, element, status) {
		  element = document.getElementById(element);
		  var span = document.createElement('span');
		  span.className = status;
		  span.appendChild(document.createTextNode(part.value));
		  element.appendChild(span);
	  }

});
