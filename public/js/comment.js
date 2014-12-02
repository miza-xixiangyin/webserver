$(document).ready(function() {
	var wrapNode = $('.content_extends');
	var pageID = wrapNode.attr('data-pageID');

	// delegate click on comment tools button
	wrapNode.delegate('.con_op', 'click', function(event) {
		var currNode = $(this);
		var type = currNode.attr('data-type');

		currNode.auth(function(){
			switch (type) {
				case 'comment':
					wrapNode.find('.con_post_box').focus();
					break;
				case 'mark':
				case 'like':
					if (currNode.hasClass('con_done')) {
						return;
					}

					$.ajax({
						url: '/op/page/mark',
						type: 'POST',
						dataType: 'json',
						data: {page: pageID, type: type},
					})
					.done(function(respone) {
						if (respone.status == 200) {
							currNode.find('.con_count').text(respone[type]);
							currNode.addClass('con_done');
						}
					})
					.fail(function() {
						console.error("error");
					})
					.always(function() {
						console.log("complete");
					});
					break;
			}
		});
	});

	// check comment content before post data to server
	$('.con_post_form').submit(function(event) {
		if (!window.xx_g.auth) event.preventDefault();
		$(this).auth(function (currNode) {
			var comment_content = $(currNode).find('.con_post_box').val();
			if ($.trim(comment_content).length == 0) {
				$(currNode).find('.con_post_msg').text('评论内容不能为空');
				event.preventDefault();
			};
		});
	});
});