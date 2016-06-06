$(function() {

	$('.ui.checkbox').checkbox();
	$('.ui.dropdown').dropdown();
	$('.ui.calendar').calendar({ on: 'hover', type: 'date' });
	$('.ui.sticky').sticky({ offset: 30 });

	$('.confirm-delete').click(function() {
		return confirm('Are you sure you want to delete this item?');
	});

	// Real-time scoring
	calculate_score();
	$('input[name*="score_"]').change(function() {
		calculate_score();
	});
	function calculate_score() {
		var preliminary_score = 100;
		var final_score = 100;
		$('input[name*=score_]:checked').each(function() {
			var penalty = parseInt($(this).val());
			if (!isNaN(penalty) && penalty != 0 ) {
				final_score += penalty;
				if (penalty != -100) {
					preliminary_score += penalty;
				}
			}
		});
		if (final_score < 0) {
			final_score = 0;
		}
		if (preliminary_score < 0) {
			final_score = 0;
		}
		$('input[name=preliminary_score]').val(preliminary_score);
		$('input[name=final_score]').val(final_score);
	}

	$('.ui.search')
	  .search({
	    apiSettings: {
	      url: '/api/v1/users/search?search={query}'
	    },
	    fields: {
	      results : 'users',
	      title   : 'name',
		  url   : 'id',
	    },
	    minCharacters : 3
	  });

});
