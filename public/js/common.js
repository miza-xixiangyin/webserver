$(document).ready(function() {
	$('.top_menu').delegate('.auth_tool', 'click', function(event) {
		$(this).auth(function(){

		}, {
			'type': $(this).attr('data-type')
		});
	});
});