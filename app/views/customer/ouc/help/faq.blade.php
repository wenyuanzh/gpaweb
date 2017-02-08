<div class="frame_1 main_content">
	<div class="frame_1_l">
		@if (View::exists('customer.' . App::make('customer')->alias . '.partials.help.menu'))
		@include('customer.' . App::make('customer')->alias . '.partials.help.menu')
		@else
		@include('customer.common.partials.help.menu')
		@endif
	</div>

	<div class="frame_1_r">
		<h1 class="header_1">常见问题</h1>
		<div class="help_content">
			<h2>1、如何申请GP平台账号？</h2>
			<p>由学校的管理员统一分配账号与密码，登陆后可以点击用户名修改密码。</p>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/common/help/faq/faq_img1.jpg">
			</p>
			<h2>2、如何知道我申请的激活是否被批准？</h2>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/common/help/faq/faq_img2.jpg">
			</p>
			<p>一般审批时间为24小时。可登陆平台后在“商品激活管理”中查看是否已审阅通过，若长时间未获得答复，建议可以联系学校管理员进行确认。</p>
			<h2>3、如何查看我的激活次数？</h2>
			<p>登陆GP平台后，商品激活管理中查看。</p>
			<h2>4、客户端使用流程图</h2>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/common/help/faq/faq_img3.jpg">
			</p>
			<h2>5、我已成功申请密钥，怎样进行激活？</h2>
			<p>密钥申请成功后，请到正版软件与服务平台下载软件并进行安装。</p>

			<h2>6、我在激活windows产品时提示DNS名称不存在怎么办？</h2>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/ouc/help/faq/faq_img4.jpg">
			</p>
			<p>请通过KMS脚本进行激活，按照图片操作方式激活即可。脚本激活链接：<a href="http://ouc.gpa.edu.cn/help/kms">http://ouc.gpa.edu.cn/help/kms</a>。</p>

			<h2>7、我在激活windows产品时提示软件授权服务报告无法激活该计算机怎么办？</h2>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/ouc/help/faq/faq_img5.jpg">
			</p>
			<p>请通过KMS脚本进行激活，按照图片操作方式激活即可。脚本激活链接：<a href="http://ouc.gpa.edu.cn/help/kms">http://ouc.gpa.edu.cn/help/kms</a>。</p>

			<h2>8、我激活office提示“未知错误，请与管理员联系”怎么办？</h2>
			<p class="img">
				<img src="{{Config::get('app.asset_url')}}images/customer/ouc/help/faq/faq_img6.jpg">
			</p>
			<p>请通过KMS脚本进行激活，按照图片操作方式激活即可。脚本激活链接：<a href="http://ouc.gpa.edu.cn/help/kms">http://ouc.gpa.edu.cn/help/kms</a>。</p>


			<h2>9、	我使用的正版软件出现问题怎么办？</h2>
			<p>请致电400-686-9667或通过邮件：service@gpa.edu.cn联系我们，我们的工作人员将协助您来排除故障。工作时间: 周一至周五 8:30-17:15(节假日除外)</p>
			<h2>10、	售后问题邮件联系流程：</h2>
			<p>请使用您所在学校的edu邮箱发送邮件至：<a href="mailto:service@gpa.edu.cn">service@gpa.edu.cn</a><br/>
			邮件内容请提供：<br/>
			姓名：<br/>
			联系方式：<br/>
			产品名称：<br/>
			所遇问题描述：<br/>
			<p>附件请提供所遇问题截图</p>
			<p>我们将在收到您的反馈信息1个工作日的时间建立工单机制受理您的问题。</p>
			<h2>11、	服务到期如何续费?</h2>
			<p>您可以直接拨打400 686 9667联系客服人员会协助您来完成，或者您也可以致电销售人员获得帮助。</p>
			<h2>更多问题请通过400 686 9667或者客服email：<a href="mailto:service@gpa.edu.cn">service@gpa.edu.cn</a> 联系我们~</h2>
		</div>
	</div>
	<div class="clear"></div>
</div>
