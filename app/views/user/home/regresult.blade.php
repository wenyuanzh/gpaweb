<div class="frame_1">
	<div class="block_1">
		<h1>注册成功</h1>
		<div>
			<ul class="information_1 info_success">
				@if (Input::get('authorized') == 1)<li>已成功注册账号。</li>
				@else <li>已成功注册账号, 请耐心等待管理员审批!</li>@endif
			</ul>
		</div>
	</div>
</div>
