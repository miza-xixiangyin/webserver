$(document).ready(function() {
	$('.about_menu').delegate('li', 'click', function(event) {
		if ($(this).hasClass('active')) {
			return;
		}
		$('.about_menu .active').removeClass('active');
		$(this).addClass('active');

		var section = $(this).attr('data-type');
		$('.info_about_section .info_about_item').hide();
		$('.info_about_section .info_section_' + section).show();
	});
});