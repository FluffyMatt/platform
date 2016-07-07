$(function() {

	$('#comment-message textarea').focusin(function() {
		$(this).addClass('focused');
		$(this).removeClass('unfocused');
	});
	$('#comment-message textarea').focusout(function() {
		$(this).removeClass('focused');
		$(this).addClass('unfocused');
	});

});
