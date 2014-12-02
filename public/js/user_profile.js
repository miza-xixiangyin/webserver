$(document).ready(function() {
	var followOp = function (ops, cb) {
		$.ajax({
			url: '/op/user/follow',
			type: 'POST',
			dataType: 'json',
			data: {user_id: ops.user_id, type: ops.type || 'remove'},
		})
		.always(cb);
	};

	// user image upload
	$('.image_file').on('change', function(event) {
		event.preventDefault();
		$('.user_image_form').ajaxSubmit({
			target: $('.user_image .preview')
		});
	});

	// edit user talk
	$('.user_profile').delegate('.user_line_tool', 'click', function(event) {
		var currentNode = $(this);
		var parentNode = currentNode.closest('.user_line');

		if (currentNode.hasClass('line_update')) {
			parentNode.addClass('editable');
			parentNode.append('<div class="user_line_update"><textarea placeholder="编写签名档" class="user_line_box">' + parentNode.find('.user_line_text').text() + '</textarea><p class="user_line_msg"></p><div><button class="user_line_tool user_line_btn user_line_submit">更  新</button><button class="user_line_tool user_line_btn user_line_cancel">取 消</button></div></div>');
		} else if (currentNode.hasClass('user_line_submit')) {
			var msg = parentNode.find('.user_line_msg');
			var line_con = $.trim(parentNode.find('.user_line_box').val());
			if (line_con.length == 0) {
				msg.text('签名档不能为空');
				return;
			}

			msg.text('更新中...');
			$.ajax({
				url: '/op/user/talk',
				type: 'POST',
				dataType: 'json',
				data: {content: line_con},
			})
			.done(function(respone) {
				if (respone.status == 200) {
					parentNode.find('.user_line_text').text(respone.talk);
				}
			})
			.fail(function() {
				console.error("error");
			})
			.always(function() {
				console.log("complete");
				parentNode.find('.user_line_update').remove();
				parentNode.removeClass('editable');
			});
		} else if (currentNode.hasClass('user_line_cancel')) {
			parentNode.find('.user_line_update').remove();
			parentNode.removeClass('editable');

		}
	});

	$('.user_social .follow').click(function(event) {
		$(this).auth(function(node){
			var follow_id = node.attr('data-id');
			var type = node.hasClass('done') ? 'remove' : 'add';

			if (node.hasClass('loading')) return;

			node.text('正在加载...');
			node.addClass('loading');
			followOp({user_id: follow_id, type: type}, function (respone, status) {
				node.removeClass('loading');
				if (respone.type == 'add') {
					node.addClass('done');
					node.html('<span class="icon">√</span>取消关注');
				} else {
					node.removeClass('done');
					node.html('<span class="icon">+</span>关注');
				}
			});
		});
	});

	// send msg
	$('.user_profile').delegate('.user_toggle_msg_box', 'click', function(event) {
		$(this).auth(function(){
			var box = $('.user_msg_box');
			var submitBtn = $('.user_msg_box .submit');
			box.toggle(200);

			if (!submitBtn.hasClass('loading')) {
				$('.user_msg_box .msg').text('');
				$('.user_msg_box textarea').removeClass('error');
			}
		});
	});
	$('.user_msg_box .submit').click(function(event) {
		$(this).auth(function(node){
			var contentNode = $('.user_msg_box textarea');
			var msgNode = $('.user_msg_box .msg');
			var content;

			content = $.trim(contentNode.val());
			if (!content) {
				contentNode.addClass('error');
				msgNode.text('纸条不能为空');
				return;
			}

			node.addClass('loading');
			contentNode.removeClass('error');
			msgNode.text('加载中...');

			$.ajax({
				url: '/op/user/msg',
				type: 'post',
				dataType: 'json',
				data: {user: $('.user_social .user_toggle_msg_box').attr('data-id'), content: content},
			})
			.done(function(res, status) {
				console.error(arguments);
				msgNode.text('发送成功');
				node.removeClass('loading');
				contentNode.val('');
			});
		});
	});

	// remove follow from lists
	$('.user_follows').delegate('.remove', 'click', function(event) {
		event.stopPropagation();
		event.preventDefault();
		var target = $(this);
		if (!confirm('确定要删除这个用户吗？')) return;

		followOp({user_id:target.attr('data-id'), type: 'remove'}, function () {
			target.closest('.user_f_item').hide(300);
		});
		
	});

	// update user setting
	$('.user_setting').delegate('.setting_form', 'submit', function(event) {
		event.preventDefault();
		var msg = $(this).find('.setting_msg');
		var type = $(this).attr('data-type');

		if (type == 'pwd') {
			var old_pwd = $('#user_f_old').val();
			var new_pwd = $('#user_f_new').val();
			var new_pwd_r = $('#user_f_new_r').val();
			
			if (old_pwd == '' || new_pwd == '' || new_pwd_r == '') {
				msg.text('请填写密码');
				return;
			} else if (new_pwd != new_pwd_r) {
				msg.text('两次新密码不一致');
				return;
			} else if (new_pwd.length < 6){
				msg.text('密码不得小于6个字符');
				return;
			}
		}

		msg.text('更新中...');

		$(this).ajaxSubmit({
			target: msg
		});
	});
});