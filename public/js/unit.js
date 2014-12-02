(function($){
	var xx_g = window.xx_g;
	// user auth checking
	$.fn.auth = function(cb, opts){
		var _opts = {
			'type': 'login'
		};
		opts = opts || {};

		for(var i in _opts) {
			if (!opts[i]) {
				opts[i] = _opts[i];
			}
		}

		if (typeof cb !== 'function') {
			console.error('callback need to be a function');
			return;
		}

		// if auth checked, cb
		if (xx_g.auth) {
			cb(this);
			return;
		}

		// show the login layout
		// check if the layout exist or not
		var login_box = $('.xx_login_box');
		if (login_box.length === 0) {
			$('body').append([
				'<div class="xx_login_box" style="display:none;">',
				'<button class="close">×</button>',
				'</div>'
			].join(''));
			login_box = $('.xx_login_box');

			// close event binding
			login_box.find('.close').click(function(event) {
				login_box.hide();
			});
		}

		// check if exist login form box
		if ($('.xx_login_form').length == 0) {
			$.get('/op/auth/box?type=' + opts.type + '&redirect=' + encodeURIComponent(location.href), function(data) {
				login_box.append(data);
			});
		}

		login_box.show();
	};
}(jQuery));