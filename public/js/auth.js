$(document).ready(function() {
	var login_box = $('.xx_login_box');
	$('.xx_login_header').delegate('.ym-gbox', 'click', function(event) {
		var type = $(this).attr('data-type');
		login_box.find('.xx_msg').hide(200);
		$('.xx_login_form').attr('class', 'xx_login_form xx_type_' + type);
	});

	$('.xx_login_form').delegate('form', 'submit', function(event) {
		event.preventDefault();

		var data = {};
		var msg = login_box.find('.xx_msg');
		data.type = $(this).attr('data-type');
		data.uname = $.trim($(this).find('.xx_login_username').val());
		data.pwd = $.trim($(this).find('.xx_login_pwd').val());

		msg.show(200);
		if (data.uname == '' || data.pwd == '') {
			msg.text('用户名跟密码不能为空');
			return;
		}

		if (data.type == 'register') {
			data.pwd_r = $(this).find('.xx_login_pwd_r').val();
			if (data.pwd != data.pwd_r) {
				msg.text('两次密码输入不相同');
				return;
			}
		};

		msg.text('正在加载...');

		$.ajax({
			url: '/op/auth/check',
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(response) {
			console.error(response);
			if (response.status == 200) {
				location.reload();
			} else {
				msg.text(response.msg);
			}
			console.log("success");
		})
		.fail(function() {
			console.log("error");
			msg.text('系统错误，请稍后重试');
		})
		.always(function() {
			console.log("complete");
		});
	});

	// third part login
	var internal_check = setInterval(function(){
		if (window.QC) {
			$('#xx_login_with_qq').removeClass('xx_hidden');
		}
		if (window.WB2) {
			$('#xx_login_with_weibo').removeClass('xx_hidden');
		}
		if (window.QC && window.WB2) {
			clearInterval(internal_check);
		}
	}, 100);
	
	$('.xx_login_social').delegate('a', 'click', function(event) {
		if($(this).hasClass('xx_qq')) {
			QC.Login.showPopup({
				appId: 101152239,
				scope: 'get_user_info',
				redirectURI: 'http://www.xixiangyin.cn/auth/qq'
			});
		} else if ($(this).hasClass('xx_weibo')) {
			var updateToServer = function (oauthData) {
				console.error(oauthData);
				$.ajax({
					url: '/auth/weibo',
					type: 'POST',
					dataType: 'json',
					data: {
						access_token: oauthData.access_token,
						openId: oauthData.uid,
						expires: oauthData.expires_in
					},
				})
				.done(function(response, status) {
					if (status == 'success' && response.status == '200') {
						location.reload();
						return;
					}
					alert('系统错误，请刷新页面后重试');
				})
				.fail(function() {
					alert('系统错误，请刷新页面后重试');
				});
				
			};

			if (WB2.checkLogin()) {
				updateToServer(WB2.oauthData);
				return;
			}

			WB2.login(function(){
				updateToServer(WB2.oauthData);
			});
		}
	});

});