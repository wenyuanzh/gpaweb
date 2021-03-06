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
		<h1 class="header_1">Win7安装SP1补丁</h1>
		<div class="help_content">
			<p>1.下载SP1补丁</p>
			<p class="img">下载地址 <a href="http://10.50.0.95/7601.17514.101119-1850_Update_Sp_Wave1-GRMSP1.1_DVD.iso">http://10.50.0.95/7601.17514.101119-1850_Update_Sp_Wave1-GRMSP1.1_DVD.iso</a></p>
			<p>2.右键点击下载的SP1补丁镜像，选择解压到文件夹</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_1.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_2.png' }}"/></p>
			<p>3.打开解压的文件夹，运行setup.exe</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_3.png' }}"/></p>
			<p>4.点击下一步</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_4.png' }}"/></p>
			<p>5.点击安装</p>
			<p class="img"><img  src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_5.png' }}"/></p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_6.png' }}"/></p>
			<p class="img"><img style="width: 800px;" src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_7.png' }}"/></p>
			<p>6.安装完成</p>
			<p class="img"><img src="{{ Config::get('app.eurasia_url') . 'images/customer/common/help/sp1/sp1_8.png' }}"/></p>
			<p>至此，Win7安装SP1补丁已安装完成</p>

			
			
		</div>
	</div>
	<div class="clear"></div>
</div>
