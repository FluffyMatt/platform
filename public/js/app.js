$(function() {

	// API Endpoints
	$.fn.api.settings.api = {
		'search user'        : '/api/v1/users/search?query={/value}'
	};

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

	$('.authors').dropdown({
		apiSettings: {
			action: 'search user',
			on: 'now',
			onResponse : function(data) {

				var response = {
					results : {}
				};

				$.each(data.users, function(index, item) {

					var result = {
						name : item.full_name,
						value : item.id
					};

					response.results[index] = result;

				});
				console.log(response);
				return response;
			}
		}
	});

});
