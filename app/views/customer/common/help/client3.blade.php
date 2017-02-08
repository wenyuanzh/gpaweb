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

	<div class="frame_1_r">
		<h1 class="header_1">GP激活客户端使用说明</h1>
		<div class="help_content">
			<h2>1 下载并安装客户端</h2>
			<p>1) <a href="
			@if (!Auth::check())
			{{ Ca\Common::link_to_login(Request::url() . '?download=1') }}
			@else
			/down/GP({{ App::make('customer')->alias }})-{{ $clientversion }}.exe
			@endif"
					 class="download">点击这里</a>下载客户端最新版本 v{{ Ca\Service\ParamsService::get('clientversion3', '3.0.0.1') }}</p>
			<p>2) 双击客户端安装文件 GP({{ App::make('customer')->alias }})-{{ $clientversion }}.exe进行安装，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/client_icon.png' }}"/></p>
			<p>3) 如果客户端正在运行，请先关闭运行中的客户端，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_2_1.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_2_2.png' }}"/></p>
			<p>4) 关闭后，点击”确定”将进入安装向导，点击下一步，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_3.png' }}"/></p>
			<p>5)点击“浏览”选择安装位置，点击”下一步”将进入安装向导，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_4.png' }}"/></p>
			<p>6) 点击”安装”开始安装客户端，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_5.png' }}"/></p>
			<p>6)正在安装，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_6.png' }}"/></p>
			<p>7) 完成安装，如需要自动运行客户端，请勾选”运行GenuinePlatform.exe”，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/install_7.png' }}"/></p>

			<h2>2 激活客户端</h2>

			<h3>1) 登录对话框</h3>
			<p>用户打开客户端后将显示该窗体供用户登录，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/login.png' }}"/></p>
			<table>
				<tr><td>单位</td><td>选择用户所属的单位</td></tr>
				<tr><td>账号</td><td>使用已注册账号，或者管理员分发的账号。</td></tr>
				<tr><td>密码</td><td>用户注册时填写密码，或者管理员分发密码，如果是管理员分发密码，登录后可以通过修改密码功能进行修改。</td></tr>
			</table>

			<h3>2) 注册对话框</h3>
			<p>在点击主面板的“申请账号”后将显示该窗体供用户注册账号，注册成功后需要等待管理员在后台进行审核，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/register.png' }}"/></p>
			<table>
				<tr><td>用户名</td><td>该账号会作为用户唯一标识，供登录和其他功能使用。</td></tr>
				<tr><td>邮箱</td><td>用户的真实邮箱，供后期交互试用。</td></tr>
				<tr><td>密码&重复密码</td><td>用户登录时候使用密码，确认密码需要和密码一样。</td></tr>
				<tr><td>姓名</td><td>用户的真实姓名，注册后供管理员在后台审核使用。</td></tr>
				<tr><td>上级部门</td><td>选择用户的隶属的上级部门，供管理员审核使用，如：财务部等。</td></tr>
			</table>

			
			<h3>3) 用户信息面板</h3>
			<p>点击“用户名“——”用户信息“查看用户信息，如图:</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/userinfo_1.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/userinfo.png' }}"/></p>

			<h3>4) 修改密码</h3>
			<p>点击“用户名“——”修改密码“，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/changepwd.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/changepwd2.png' }}"/></p>
			<table>
				<tr><td>当前密码</td><td>当前用户登录的密码。</td></tr>
				<tr><td>新密码/确认密码</td><td>输入需要修改的新密码，确认密码必须和新密码一样。</td></tr>
			</table>

				
			<h3>5) 切换账号</h3>
			<p>用户登录后，点击打开菜单图标下的“切换账号“如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/switching_account_1.png' }}"/></p>
			<p>点击“确定“后，重新输入账号</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/switching_account_2.png' }}"/></p>

			<h3>6) 平台应用</h3>
			<p>点击主客户端图标，弹出”平台应用“，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/applist.png' }}"/></p>
			<table>
				<tr><td>商品激活管理</td><td>点击打开对话框，激活你需要激活的商品</td></tr>
				<tr><td>系统自动更新</td><td>设置系统自动更新</td></tr>
			</table>

			<h3>7) 商品激活管理</h3>
			<p>点击”平台应用面板”上的”商品激活管理”打开应用，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/activatemanage1.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/activatemanage.png' }}"/></p>
			<table>
				<tr><td>激活模式</td><td>商品以什么模式激活</td></tr>
				<tr><td>可激活</td><td>商品还可以激活多少次。</td></tr>
				<tr><td>激活申请</td><td>点击后打开激活申请对话框，填写信息后向管理员申请激活次数。</td></tr>
				<tr><td>激活历史</td><td>点击后打开”商品激活历史”对话框，显示历史激活记录</td></tr>
			</table>

			<h3>8) 商品激活管理 – 激活申请</h3>
			<p>点击”商品激活管理”对应的”激活申请”，打开申请对话框，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/activateapply.png' }}"/></p>
			<table>
				<tr><td>申请量</td><td>需要申请多少次激活量，该数据将在管理员审批&分配的时候查阅。</td></tr>
				<tr><td>申请原因</td><td>填写后，供管理员在后台进行判断是否通过审批。</td></tr>
			</table>

			<h3>9) 商品激活管理 – 商品激活</h3>
			<p>在”商品激活管理面板”上，点击商品前的按钮，商品服务状态将自动开启，平台将自动检测并激活需要激活商品，也可以点击“立即激活“按钮立即激活商品，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/productactivate.png' }}"/></p>
			<table>
				<tr><td>可激活</td><td>该商品还可以激活多少次，如果次数小于1次，将无法激活，用户可以返回后申请激活次数。</td></tr>
				<tr><td>激活</td><td>客户端每间隔1个小时会检测一次激活状态, 若选择商品未激活，客户端会自动激活</td></tr>
				<tr><td>关闭</td><td>只要在“商品激活管理“面板打开了激活服务, 并选择了需要要激活的商品，在关闭客户端的状态下，平台也会检查商品的激活状态，并进行激活。</td></tr>
			</table>

			<h3>10) 商品激活管理 – 系统自动更新</h3>
			<p>在”商品激活管理面板”上，点击”系统自动更新”，进入对应系统自动更新面板，如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/autoupdate.png' }}"/></p>
			<table>
				<tr><td>设置更新服务器</td><td>点击”确定”按钮将，软件会将后台设置的更新服务器地址设置到本机，系统将自动从更新服务器地址获取更新。</td></tr>
			</table>
			<h3>11)退出平台</h3>
			<p>用户登录后，点击打开菜单图标下的“退出平台“如图：</p>
			<p class="img"><img src="{{ Config::get('app.asset_url') . 'images/customer/common/help/client3/sign_out.png' }}"/></p>
		</div>
	</div>
	<div class="clear"></div>
</div>
