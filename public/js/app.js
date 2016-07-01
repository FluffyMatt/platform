$(function() {

	// CKEDITOR
	if ($('[name="body"]').length > 0) {
		CKEDITOR.replace('body', {
			skin: 'flat,/js/flat/',
			customConfig: '/js/ckeditor.js'
		})
	};

	$('#save').click(function() {
		$('.ui.form').submit();
	});

	$('.item.delete-confirm').click(function() {
		$(this).children('form').submit();
	})

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
