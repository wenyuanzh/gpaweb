<div class="main_footer">
	<div class="frame_1">
		<ul>
			<h1>关于我们</h1>
			<li><a href="#">联系我们</a></li>
			<!-- <li><a href="#">隐私申明</a></li> -->
		</ul>
		<ul>
			<h1>技术支持</h1>
			<li><a href="@if (!Auth::check())
			{{ Ca\Common::link_to_login(Request::url() . '?download=1') }} @else /down/GP-lastest({{ App::make('customer')->alias }}).exe@endif" title="最新版本: {{ Ca\Service\ParamsService::get('clientversion', '2.0.0.6') }}">GP客户端下载</a></li>
			<!-- <li><a href="#">客服服务</a></li>
			<li><a href="#">产品支持</a></li> -->
		</ul>
		<ul>
			<h1>相关网站</h1>
			<li><a target="_blank" href="http://microsoft.com">微软官网</a></li>
			<li><a target="_blank" href="http://windows.microsoft.com">Windows 官网</a></li>
			<li><a target="_blank" href="http://office.microsoft.com">Office 官网</a></li>
		</ul>
		<h2>微软合作伙伴</h2>
		<p class="copyright"><a href="http://www.miitbeian.gov.cn" rel="nofollow" target="_blank">{{ Ca\Consts::$icp }}</a> © 2005-2013 版权所有，并保留所有权利</p>
	</div>
	<div class="clear"></div>
</div>