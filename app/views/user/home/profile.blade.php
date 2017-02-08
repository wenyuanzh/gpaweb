<div class="frame_1">
	<div class="block_1 user_info">
		<h1>用户信息</h1>
		<div class="avatar"><img src="{{ Config::get('app.asset_url') }}images/user/avatar_72.gif" /></div>
		<div class="actions">
			@if (Ca\Service\ParamsService::get('changepassword') == 1)
			<a href="/changepwd">修改密码</a>
			@endif
		</div>
		<table class="form_1">
			<tr>
				<td class="label">真实姓名：</td>
				<td class="text">{{ $user->name }}</td>
			</tr>
			<tr>
				<td class="label">用户帐号：</td>
				<td class="text">{{ $user->username }}</td>
			</tr>
			<!-- <tr>
				<td class="label">邮箱：</td>
				<td class="text">{{ $user->email }}</td>
			</tr>
			 -->
			<tr>
				<td class="label">用户状态：</td>
				<td class="text green">{{ Ca\Consts::$user_status_texts[$user->status] }}</td>
			</tr>
			<tr>
				<td class="label">上级部门：</td>
				<td class="text">{{ $user->department_name }}</td>
			</tr>
			<tr>
				<td class="label">注册时间：</td>
				<td class="text">{{ $user->createdate }}</td>
			</tr>
		</table>
		<div class="clear"></div>
	</div>
</div>