<script type="text/javascript">
$(function() {
	var updateStatus = function(eid) {
		$.post("/product/status", { "eid": eid }, function() {
			backend.list();
		});
	};

	var getText = function(row) {
		switch (row["status"] >> 0) {
			case 1:
				return [ "禁用", true ];
			case 2:
				return [ "启用", false ];
		}
		return "";
	};

	var statusTip = function(row) {
		switch (row["status"] >> 0) {
			case 1:
				return "修改应用状态为\"禁用\"<br/><span class='subtip_1'>禁用后, 客户端不允许申请并激活该商品, 并且不可见</span>";
			case 2:
				return "修改应用状态为\"可用\"<br/><span class='subtip_1'>启用后, 客户端可以申请并激活该商品</span>";
		}
		return "";
	};

	var statusValueClass = function(row) {
		var ret = "";
		switch (parseInt(row["status"])) {
			case 1:
				ret = "green";
				break;
			case 2:
				ret = "red";
				break;
		}

		return ret;
	};

	var backend = $.backend({
		pageIndex: 1,
		tableStructure: {
			eid: "productid",
			columns: [
				{ "key": "productid", "header": "编号", "class": "number" },
				{ "key": "name", "header": "名称" },
				{ "key": "intro", "header": "描述", "class": "text" },
				{ "key": "type", "header": "激活模式", "class": "state", "headertip": "<strong>定时激活</strong>: 需要在180天后再次运行客户端激活<br/><strong>永久激活</strong>: 激活后永久保持激活状态" },
				{ "key": "status_text", "header": "状态", "class": "state", "headertip": "<strong>可用</strong>: 客户端将可以激活该商品<br/><strong>禁用</strong>: 客户端不可以激活该商品", "valueclass": statusValueClass }
			]
		},
		category: "商品",
		selects: [  ],
		operators: [ { type: "callback", callback: updateStatus, text: getText, css: "btn_switch", tip: statusTip } ],
		modifyStructure: { status: "status" },
		validateRule: {},
		validateMessages: {}
	});
});
</script>

@actions (array('title' => '商品管理', 'buttons' => array()))

@search
	array('label' => '名称', 'type' => 'textbox', 'name' => 'name', 'placeholder' => '激活商品名称')
@endsearch
