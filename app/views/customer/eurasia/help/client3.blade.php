@if (Input::get('download') == 1)
<script type="text/javascript">
	@if (Auth::check())
	window.setTimeout(function() {
		document.location.href = "/down/GP({{ App::make('customer')->alias }})-{{ $clientversion }}.exe";
	}, 1000);
	@else
	document.location.href = "/";
	@endif
</script>
@endif
<div class="frame_1 main_content">
	<div class="frame_1_l">
		@if (View::exists('customer.' . App::make('customer')->alias . '.partials.help.menu'))
		@include('customer.' . App::make('customer')->alias . '.partials.help.menu')
		@else
		@include('customer.common.partials.help.menu')
		@endif
	</div>
	<style type="text/css">
	.help_content .img{
		background: #fff;
		
	}
	.help_content p{
		font-size:14px; 
		color: black;
	}

	</style>
	<div class="frame_1_r">
		<h1 class="header_1">GP激活客户端使用说明</h1>
		<div class="help_content">
			<p>1. 访问ms.eurasia.edu，在页面右下方点击"下载最新客户端"</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client1.png' }}" width="800"/></p>
			<p>2. 输入一卡通账号和密码（密码默认为身份证后六位），点击登录，登录成功后开始下载</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client2.png' }}" width="800"/></p>
			<p>3. 下载完成后，双击下载的程序，开始安装</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client3.png' }}"/></p>
			<p>4. 点击"是"允许安装</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client4.png' }}"/></p>
			<p>5. 选择安装时使用的语言</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client5.png' }}"/></p>
			<p>6. 选择安装位置</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client6.png' }}"/></p>
			<p>7. 点击"下一步"，开始安装</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client7.png' }}"/></p>
			<p>8. 点击"安装"</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client8.png' }}"/></p>
			<p>9. 点击"完成"</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client9.png' }}"/></p>
			<p>10. 安装完成后会弹出登录界面，输入一卡通账号和密码（密码默认为身份证后六位），点击登录</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client10.png' }}"/></p>
			<p>11. 登录成功后会在桌面右下角生成正版化客户端的图标</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client11.png' }}"/></p>
			<p>12. 点击图标，然后点击"商品激活管理"，打开激活平台</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client12.png' }}"/></p>
			<p>13. 激活平台打开后，可以查看该账号可以激活的产品以及可激活的次数（ 默认给每个账号的office和windows产品各分配了10次激活量）</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client13.png' }}"/></p>
			<p>14. 在最左边勾选需要激活的产品，然后点击"立即激活"</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client14.png' }}"/></p>
			<p>15. 激活完成后系统右下角会弹出激活成功或失败的提示</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/client3/client15.png' }}" width="800"/></p>
		</div>
	</div>
	<div class="clear"></div>
</div>
