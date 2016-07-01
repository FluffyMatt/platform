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

});
