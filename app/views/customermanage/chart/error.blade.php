<script type="text/javascript">
	var errorMessage = {
		"0xC004C001": "激活服务器确定指定的产品密钥无效",
		"0xC004C003": "激活服务器确定指定的产品密钥被阻止",
		"0xC004B100": "激活服务器确定无法激活计算机",
		"0xC004C008": "激活服务器确定无法使用指定的产品密钥",
		"0xC004C020": "激活服务器报告多次激活密钥已超过其限制",
		"0xC004C021": "激活服务器报告已超过多次激活密钥扩展限制",
		"0xC004F009": "软件授权服务报告已超过宽限期",
		"0xC004F00F": "软件授权服务器报告硬件 ID 界限超过容许的级别",
		"0xC004F014": "软件授权服务报告产品密钥不可用",
		"0xC004F02C": "软件授权服务报告脱机激活数据的格式不正确",
		"0xC004F035": "软件授权服务报告无法使用批量许可证产品密钥激活",
		"0xC004F038": "密钥管理服务 (KMS) 报告的数量不足",
		"0xC004F039": "软件授权服务报告无法激活计算机。未启用密钥管理服务 (KMS)",
		"0xC004F041": "软件授权服务确定无法使用指定的密钥管理服务器 (KMS)",
		"0xC004F042": "软件授权服务判定无法使用特定的密钥管理服务 (KMS)",
		"0xC004F050": "软件授权服务报告产品密钥无效",
		"0xC004F051": "软件授权服务报告产品密钥被阻止",
		"0xC004F064": "软件授权服务报告已超过非正版宽限期",
		"0xC004F065": "软件授权服务报告应用程序在有效的非正版期限内运行",
		"0xC004F066": "软件授权服务报告不能在设置从属属性之前设置正版信息属性",
		"0xC004F069": "软件授权服务报告未找到产品 SKU",
		"0x80070005": "访问被拒绝, 请求的操作需要提升特权",
		"0x8007232A": "DNS 服务器出现故障",
		"0x8007232B": "RPC 服务器不可用",
		"0x800706BA": "DNS 名称不存在",
		"0x8007251D": "未找到 DNS 查询记录",
		"0xC004D307": "已超过重新整理的最大允许数量, 必须重新安装系统",
		"0xC004D302": "安全处理器报告受信任的数据存储已重置, 请重启",
		"0xC004F074": "密钥管理服务(KMS)不可用",
		"0xC004F025": "激活需要提升到管理员权限",
		"0xC004F015": "软件授权服务报告许可证未安装",
		"0x80072EFE": "与服务器的连接意外终止",
		"0x80041017": "激活脚本与系统版本不匹配",
		"0x80072EE2": "操作超时, 请检查网络连接",

		"0xZ0000001": "设置激活服务器失败, 请稍后重试",
		"0xZ0000002": "激活失败, 请稍后重试",
		"0xZ0000003": "上次请求未完成, 请稍后重试",
		"0xZ0000004": "激活服务器端口错误, 请稍后再试",
		"0xZ0000005": "激活服务器连接错误, 请稍后再试"
	};
	var _selects = [ "date", "productid" ];
	var _chartOption = {
		chart: {
			renderTo: "chart",
			type: 'pie'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		plotOptions: {
			pie: {

			}
		},
		tooltip: {
			formatter: function() {
//				console.log(this);
				return "错误代码：" + this.key + (this.key in errorMessage ? "<br />" + errorMessage[this.key] : "") + "<br />错误次数：" + this.y;
			}
		},

		series: []
	};
</script>

@actions (array('title' => '激活错误统计', 'buttons' => array('export')))

@search
array('label' => '日期', 'type' => 'select', 'name' => 'date'),
array('label' => '商品', 'type' => 'select', 'name' => 'productid')
@endsearch


