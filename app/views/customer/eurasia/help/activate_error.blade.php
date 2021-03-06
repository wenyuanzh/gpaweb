@if (Input::get('download') == 1)
<script type="text/javascript">
	
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
		<h1 class="header_1">关于错误0xC004F035解决方案</h1>
		<div class="help_content">
			<p>0xC004F035 软件授权服务报告无法使用批量许可证产品密钥激活出现这个错误，可能是这台电脑 BIOS 里的 ACPI_SLIC 表损坏</p>
			<p>解决步骤</p>
			<p>1.下载 <a href="http://10.50.0.95/BIOS.rar">SLIC_Dump_ToolKit、DBSLDR</a> 工具</p>
			<p>2.右键“以管理员身份”运行“SLIC_Dump_ToolKit.EXE”，如下图红色区域所示，如显示“提取失败！（SLIC表没有找）”则进入步骤3</p>				
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/0xC004F035/error1.png' }}"/></p>
			<p>3.右键“以管理员身份”运行“DBSLDR.EXE”，默认采用“自动选择加载”方法，直接单击“安装”即可，提示安装成功！重启生效（不会对硬件造成改动）。</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/0xC004F035/error2.png' }}"/></p>

			<p>4.重启后，用SLIC DUMP ToolKIT检测（也需要管理员身份运行），在状态栏显示“提取成功”，说明安装成功，可以按照正常步骤进行激活。</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/0xC004F035/error3.png' }}"/></p>

		</div>
	</div>
	<div class="clear"></div>
</div>
