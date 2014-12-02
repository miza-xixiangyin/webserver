$(document).ready(function() {
	$('.love_btn').click(function(event) {
		event.preventDefault();

		var content = $.trim($('.post_form textarea').val());
		if (content.length == 0) {
			$('.love_msg').text('内容不能为空');
			return;
		}

		$('.love_msg').text('正在加载中...');
		$('.post_form').ajaxSubmit({
			target: $('.love_content'),
			success: function () {
				$('.love_msg').text('');
			}
		});
	});

	$('.love_wrap').delegate('.love_respone', 'click', function(event) {
		$(this).replaceWith('<textarea name="content"></textarea>');
	});

	$("#xx_player").jPlayer({
		ready: function () {
			var player = $(this).jPlayer('setMedia', {
				mp3: '/js/Jplayer/test_mp3.mp3'
			});
			var statusBar = $('.player_status');

			var handler = function () {
				if (statusBar.hasClass('jp-play')) {
					player.jPlayer('play');
				} else {
					player.jPlayer('pause');
				}
				statusBar.toggleClass('jp-play');
			};

			handler();
			statusBar.on('click', handler);
		},
		swfPath: '/js/Jplayer',
		supplied: 'mp3',
		loop: true,
		preload: 'auto'
	});
});