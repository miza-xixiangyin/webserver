<div class="user_setting">
	<h4 class="setting_title"><p class="setting_box">个人资料设置</p></h4>
	<div class="setting_box">
		<h5 class="section_title">个人信息</h5>
		<form class="setting_form" action="{{ URL::route('api_user_info') }}" method="post" data-type="info">
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox">登陆邮箱</div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">{{ $user->email }}</div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"><label for="user_f_nick">昵称</label></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox"><input class="input" id="user_f_nick" name="nick" value="{{ $user->nick }}" /></div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox">性别</div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">
						<label>{{ Form::radio('gender', '1', $user->gender == 1 ? true : false) }}男</label>
						<label>{{ Form::radio('gender', '2', $user->gender == 2 ? true : false) }}女</label>
					</div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"><label for="user_f_phone">手机号</label></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox"><input class="input" id="user_f_phone" name="phone" value="{{ $user->phone }}" /></div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">
						<button class="submit" type="submit">修 改</button>
						<p class="setting_msg"></p>
					</div>
				</div>
			</div>
		</form>
		<h5 class="section_title">修改密码</h5>
		<form class="setting_form" action="{{ URL::route('api_user_pwd') }}" method="post" data-type="pwd">
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"><label for="user_f_old">原始密码</label></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox"><input class="input" id="user_f_old" name="o_pwd" type="password" /></div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"><label for="user_f_new">新密码</label></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox"><input class="input" id="user_f_new" name="n_pwd" type="password" /></div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"><label for="user_f_new_r">确认新密码</label></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox"><input class="input" id="user_f_new_r" name="n_pwd_r" type="password" /></div>
				</div>
			</div>
			<div class="ym-grid">
				<div class="ym-g20 ym-gl">
					<div class="ym-gbox"></div>
				</div>
				<div class="ym-g80 ym-gr">
					<div class="ym-gbox">
						<button class="submit" type="submit">修 改</button>
						<p class="setting_msg"></p>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>