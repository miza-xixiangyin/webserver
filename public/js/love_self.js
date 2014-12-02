$(document).ready(function() {
	 $("#xx_player").jPlayer({
		ready: function () {
			var audio_source = $(this).attr('data-source');

			var player = $(this).jPlayer('setMedia', {
				mp3: audio_source
			});
			var statusBar = $('.player_status');

			var handler = function () {
				if (statusBar.hasClass('jp-play')) {
					console.error('sss');
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