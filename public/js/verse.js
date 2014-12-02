$(document).ready(function() {
	$('#page_content .page_wrap').delegate('img', 'click', function(event) {
		$(this).auth(function (curr_node) {
			var img_src = curr_node.attr('src');
			// check the tool box exist or not
			var box = $('.verse_box_wrap');
			if (box.length == 0) {
				var box_tem = [
					'<div class="verse_box_wrap">',
						'<div class="verse_box">',
							'<div class="verse_contain">loading...</div>',
							'<div class="tools">',
								'<div class="header">',
									'<p>当你读着这首诗，心里也一定想着一个人吧。写下那句你深藏已久的话，让我们帮你寄给TA</p>',
								'</div>',
								'<div class="body_box">',
									'<form class="verse_form" method="post" action="/op/verse/post">',
										'<input type="hidden" name="verse" class="verse_src" value="" />',
										'<textarea class="input" placeholder="留言" name="content"></textarea>',
										'<p class="text_count"><span class="curr_count">0</span>/200字符</p>',
										'<label class="body_select" style="display:none;">',
											'寄送方式',
											'<select class="send_type" name="send_type"><option value="email">电子邮箱</option><option value="phone">手机号码</option></select>',
										'</label>',
										'<label class="body_input body_input_phone" style="display:none;">',
											'输入TA的手机号',
											'<input class="input phone" name="phone" />',
										'</label>',
										'<label class="body_input body_input_email">',
											'输入TA的邮箱',
											'<input class="input email" placeholder="@" name="email" />',
										'</label>',
										'<button type="submit" class="submit">发送</button>',
										'<p class="verse_msg"></p>',
									'</form>',
								'</div>',
							'</div>',
						'</div>',
						'<button class="close">×</button>',
					'</div>'
				].join('');
				$('body').append(box_tem);
				box = $('.verse_box_wrap');
				box.find('.close').click(function(event) {
					$('body').removeClass('show_verse_box');
				});
				var text_count_node = $('.curr_count');
				var text_count_wrap = $('.text_count');
				box.find('textarea').keyup(function(event) {
					var text_count = $(this).val().length;
					text_count_node.text(text_count);
					if (text_count > 200) {
						text_count_wrap.addClass('error');
					} else {
						text_count_wrap.removeClass('error');
					}
				});

				box.find('.send_type').change(function(event) {
					var type = $(this).val();
					$('.body_input').hide();
					$('.body_input_' + type).show();
				});

				box.find('.verse_form').submit(function(event) {
					event.preventDefault();
					var msg = $('.verse_msg');
					var phone = $.trim(box.find('.phone').val());
					var email = $.trim(box.find('.email').val());
					var content = $.trim(box.find('textarea').val());
					var msg_text = [];

					if (content == '') {
						msg_text.push('* 留言不能为空');
					} else if (content.length > 200) {
						msg_text.push('* 留言不能超过200个字');
					}

					if (box.find('.send_type').val() == 'email') {
						if (!email) {
							msg_text.push('* 邮箱不能为空');
						} else {
							var pattern= /^(?:[a-z\d]+[_\-\+\.]?)*[a-z\d]+@(?:([a-z\d]+\-?)*[a-z\d]+\.)+([a-z]{2,})+$/i;
							if (!pattern.test(email)) {
								msg_text.push('* 邮箱格式不正确');
							}
						}
					} else {
						if (!phone) {
							msg_text.push('* 手机号码不能为空');
						} else {
							var pattern=/(^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$)|(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
							if (!pattern.test(phone)) {
								msg_text.push('* 手机号不正确');
							}
						}
					}
					
					if (msg_text.length > 0) {
						msg.html(msg_text.join('<br />'));
						return;
					}

					msg.text('正在发送...');
					$(this).ajaxSubmit({
						target: msg
					});
				});
			}

			$('.body_input').hide();
			$('.body_input_' + box.find('.send_type').val()).show();
			box.find('.input').val('');
			box.find('.verse_src').val(img_src);
			box.find('.verse_contain').html('<img src="' + img_src + '" />');
			$('body').addClass('show_verse_box');
		});
	});
});