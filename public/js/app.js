$(function() {

	// CKEDITOR
	if ($('[name="body"]').length > 0) {
		CKEDITOR.replace('body', {
			skin: 'flat,/js/flat/',
			customConfig: '/js/ckeditor.js'
		})
	}

	// Semantic
   $('.ui.calendar').calendar({
		on: 'focus',
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
	$('.ui.dropdown').dropdown({on: 'focus'})

});
