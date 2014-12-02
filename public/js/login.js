$(document).ready(function () {
	$('#login_nav').delegate('a', 'click', function () {
		var formNode = $('#login_wrap');
		var currID = $(this).attr('data-tab');

		if (formNode.hasClass(currID)) {
			formNode.removeClass(currID);
			return;
		}
		formNode.attr('class', currID);
	});
});
