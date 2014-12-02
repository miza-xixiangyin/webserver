<style type="text/css">
	.xx_login_box .xx_login_form {
	width: 540px;
	height: 254px;
	background: #f3f3f3;
	box-shadow: 0 0 10px rgba(0,0,0,0.7);
	position: absolute;
	left: 50%;
	margin-left: -270px;
	top: 50%;
	margin-top: -127px;
}
.xx_login_box .xx_login_header {
	border-bottom: 1px solid #b8a8a1;
	color: #fff;
	text-align: center;
}
.xx_login_box .xx_login_header .ym-gbox {
	padding: 12px 0;
	background: #92786c;
	cursor: pointer;
}
.xx_login_box .xx_form_login,
.xx_login_box .xx_form_register {
	display: none;
}
.xx_login_box .xx_type_login .xx_s_login .ym-gbox,
.xx_login_box .xx_type_register .xx_s_register .ym-gbox {
	background-color: #ececec;
	color: #935d45;
	cursor: default;
}
.xx_login_box .xx_type_login .xx_form_login,
.xx_login_box .xx_type_register .xx_form_register {
	display: block;
}
.xx_login_box .xx_login_social .ym-gbox{
	padding: 0 0 0 60px;
}
.xx_login_box .xx_login_social a {
	display: block;
	height: 30px;
	width: 142px;
	margin-top: 8px;
}
.xx_login_box .xx_weibo {
	background: url("/images/login_weibo.png") left center no-repeat;
}
.xx_login_box .xx_qq {
	background: url("/images/login_qq.png") left center no-repeat;
}
.xx_login_box .xx_login_social h4{
	color: #767575;
	font-size: 11px;
	margin: 40px 0 12px 0;
}
.xx_login_box .xx_form_item {
	padding: 40px 0 0 0;
}
.xx_login_box .xx_input {
	display: block;
	margin: -1px auto 0 auto;
	border: 1px solid #b48f7e;
	background: #efefef;
	padding: 6px;
	width: 176px;
	font-size: 13px;
	color: #6b2f14;
}
.xx_login_box .xx_login_username{
	border-top-right-radius: 3px;
	border-top-left-radius: 3px;
}
.xx_login_box .xx_login_last{
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
}
.xx_login_box .xx_btn {
	display: block;
	margin: 20px auto 0 auto;
	background: #955e45;
	border: none;
	padding: 8px;
	width: 190px;
	border-radius: 2px;
	color: #fff;
}
.xx_login_box .xx_btn:hover {
	background: #92786c;
}
.xx_login_box .xx_tools {
	width: 190px;
	margin: 4px auto 0 auto;
	font-size: 10px;
}
.xx_login_box .xx_tools, .xx_login_box .xx_tools a {
	color: #955e45;
}
.xx_login_box .xx_forget {
	display: block;
	float: right;
}
.xx_login_box .xx_msg {
	margin: 8px 0 0 40px;
	font-size: 11px;
	color: #955e45;
}
</style>
<div class="xx_login_form xx_type_{{ $type }}">
	<div class="ym-grid xx_login_header">
		<div class="ym-g50 ym-gl xx_s_login">
			<div class="ym-gbox" data-type="login">登  陆</div>
		</div>
		<div class="ym-g50 ym-gr xx_s_register">
			<div class="ym-gbox" data-type="register">注  册</div>
		</div>
	</div>
	<div class="ym-grid">
		<div class="ym-g50 ym-gl">
			<div class="ym-gbox">
				<div class="xx_form_item xx_form_login">
					<form method="post" data-type="login">
						<input class="xx_input xx_login_username" placeholder="用户名/邮箱" />
						<input class="xx_input xx_login_last xx_login_pwd" type="password" placeholder="密码" />
						<button class="xx_btn" type="submit">登 陆</button>
						<div class="ym-contain-oh xx_tools">
							<label><input type="checkbox" />记住密码</label>
							<a class="xx_forget" href="{{ URL::route('forget_pwd') }}">忘记密码</a>
						</div>
					</form>
				</div>
				<div class="xx_form_item xx_form_register">
					<form method="post" data-type="register">
						<input class="xx_input xx_login_username" placeholder="邮箱地址" />
						<input class="xx_input xx_login_pwd" type="password" placeholder="密码" />
						<input class="xx_input xx_login_last xx_login_pwd_r" type="password" placeholder="再次输入密码" />
						<button class="xx_btn" type="submit">注 册</button>
					</form>
				</div>
			</div>
		</div>
		<div class="ym-g50 ym-gr xx_login_social">
			<div class="ym-gbox">
				<h4>使用社交账号登陆</h4>
				<a class="xx_hidden xx_weibo" id="xx_login_with_weibo"></a>
				<a class="xx_hidden xx_qq" id="xx_login_with_qq"></a>
				<span id="userName"></span>
			</div>
		</div>
	</div>
	<p class="xx_msg"></p>
</div>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc-1.0.1.js" charset="UTF-8"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2844766283" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/js/auth.js" charset="UTF-8"></script>
