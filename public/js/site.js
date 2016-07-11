$(function() {

	// Comments
	$('#comment-message textarea').focusin(function() {
		$(this).removeClass('inactive');
	});

	// Messages
	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
	});

});
