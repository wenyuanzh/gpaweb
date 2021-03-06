<script type="text/javascript" src="{{ Config::get('app.asset_url') }}scripts/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ Config::get('app.asset_url') }}scripts/safeenter.js"></script>
<script type="text/javascript">
$(function() {
	var form = $("#loginForm");

	var errorField = $("input[type='text'].error", form);
	if (errorField.size() > 0) errorField.eq(0).focus().select();
	else $("input[type!='hidden']:eq(0)", form).select();
	$("input[type='text'], input[type='password']", form).listenForEnter().bind("pressedEnter", function() {
		$(".submit", form).click();
	});

	form.validate({
		errorPlacement: function(error, element) {
			error.appendTo(element.closest("td").next().find(".info").text(''));
		},
		rules: {
			password: {
				required: true,
				minlength: 3
			},
			username: {
				required: true
			},
			captcha: {
				required: true
			}
		},
		messages: {
			password: {
				required: "密码不能为空",
				minlength: "密码长度不能小于6位"
			},
			username: {
				required: "用户名不能为空"
			},
			captcha: {
				required: "验证码不能为空"
			}
		}
	});
	$("form#loginForm .submit").click(function() {
		if ($(this).hasClass("button_1_disabled")) return false;
		if (form.valid()) {
			$(this).text("登录中...").addClass("button_1_disabled");
			form.submit();
		}
		else $("input.error:eq(0)").select();
		return false;
	});
});
</script>

<div class="frame_1">
	<div class="block_1 block_1_account">
		<h1>登录GP平台</h1>
		<div class="block_1_l">
			{{ Form::open(array('method' => 'POST', 'id' => 'loginForm')) }}
			<table class="form_1">
				<tr>
					<td class="label">用户名：</td>
					<td>
						{{ Form::text('username', $input['username'], array('class' => 'textbox_1 ' . (!$errors->has('username') ? '' : 'error'), 'id' => 'username')) }}
					</td>
					<td><span class="info"><label class="error">{{ $errors->first('username') }}</label></span></td>
				</tr>
				<tr>
					<td class="label">登录密码：</td>
					<td>
						{{ Form::password('password', array('class' => 'textbox_1 ' . (!$errors->has('password') ? '' : 'error'), 'id' => 'password')) }}
					</td>
					<td><span class="info"><label class="error">{{ $errors->first('password') }}</label></span></td>
				</tr>
				<tr class="row_captcha">
					<td class="label">验证码：</td>
					<td>
						{{ Form::text('captcha', '', array('class' => 'textbox_1 textbox_1_capcha ' . (!$errors->has('captcha') ? '' : 'error'), 'id' => 'captcha', 'maxlength' => '6')) }}
					</td>
					<td><span class="info"><label class="error">{{ $errors->first('captcha') }}</label></span></td>
				</tr>
				<tr>
					<td class="label"></td>
					<td>
						<input name="remember" type="checkbox" id="remember" />
						<label for="remember">记住登录状态</label>
					</td>
				</tr>
				<tr class="actions">
					<td></td>
					<td>
						<a href="#" class="button_1 btn_login submit">登&nbsp;录</a>
						@if (Ca\Service\ParamsService::get('retrievepassword') == 1)
						<a href="{{ url('/forgetpwd') }}" class="text_1">忘记密码？</a>
						@endif
					</td>
				</tr>
			</table>
			{{ Form::close() }}
		</div>
		@if (Ca\Service\ParamsService::get('register') == 1)
		<div class="block_1_r">
			<h2>还未注册GP平台账号?</h2>
			<p>立即注册GP账号，开始使用正版软件，还有更多精彩内容！</p>
			@if (Ca\Service\ParamsService::get('registerurl'))
			<a href="{{ Ca\Service\ParamsService::get('registerurl') }}" target="_blank" class="button_1 button_1_a">注册账号</a>
			@else
			<a href="{{ URL::to('/register') }}" class="button_1 button_1_a">注册账号</a>
			@endif
		</div>
		@endif
		<div class="clear"></div>
	</div>
</div>
