<link rel="stylesheet" href="{{ Config::get('app.asset_url') }}/scripts/kindeditor/themes/default/default.css" />
<script type="text/javascript" src="{{ Config::get('app.asset_url') }}/scripts/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="{{ Config::get('app.asset_url') }}/scripts/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
	$(function() {
		var updateStatus = function(eid) {
			$.post("/autoassign/status", { "eid": eid }, function() {
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
					return "修改自动分配状态为\"禁用\"";
				case 2:
					return "修改自动分配状态为\"可用\"";
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
				case 0:
					ret = "red";
					break;
			}
			return ret;
		};

		var deleteEnable = function(row) {
			return row["autoassignid"] >> 0 != 0;
		};

		var deleteTip = function(row) {
			return row["autoassignid"] >> 0 == 0 ? "默认分配无法删除" : "删除";
		};

		//初始化新增和编辑对话框
		var initDialog = function(eid, data, table) {
			if (eid == null || eid >> 0 != 0)
			{
				var noteInput = $("<input/>").addClass("textbox_1").attr({
					"type": "text", "name": "note",
					"value": typeof(data.note) == "undefined" ? "" : data.note
				});
				table.append(
					$("<tr/>")
						.append($("<td/>").text("自动分配说明:"))
						.append($("<td/>").append(noteInput))
				);
			}
			var autoassignkeys = data.autoassignkeys;
			$.each(autoassignkeys, function(index, value) {
				var tr = $("<tr/>");
				var td_1 = $("<td/>");
				td_1
					.addClass("label")
					.append(
						$("<label/>")
							.append(
								$("<span/>")
									.addClass("tip_1")
									.attr({ "title": value["product_name"] })
							)
							.append(" " + value["name"] + " ["+ value["type_text"] +"]" +":")
					);
				tr.append(td_1);

				var td_2 = $("<td/>");
				td_2
					.attr({ "colspan": "1" })
					.append(
						$("<input/>")
							.attr({ "type": "hidden", "name": "auto_keyid[]" })
							.val(value["keyid"])
					)
					.append(
						$("<input/>")
							.attr({ "type": "hidden", "name": "auto_type[]" })
							.val(value["type_value"])
					)
					.append(
						$("<input/>")
							.attr({ "type": "text", "name": "auto_amount[]" })
							.addClass("textbox_1")
							.val(value["amount"])
					);
				tr.append(td_2);

				var td_3 = $("<td/>").addClass("error");
				tr.append(td_3);

				table.append(tr);
			});
			if (autoassignkeys.length == 0) {
				table.append($("<tr/>").append($("<td/>").html("无可用密钥")));
			}
		}

		var backend = $.backend({
			tableStructure: {
				eid: "autoassignid",
				columns: [
					{ "key": "autoassignid", "header": "编号", "class": "number" },
					{ "key": "keyassign", "header": "分配详情" },
					{ "key": "assigntype", "header": "分配类型" },
					{ "key": "note", "header": "分配说明" },
					{ "key": "status_text", "header": "状态", "valueclass": statusValueClass }
				]
			},
			category: "自动分配",
			selects: [ ],
			operators: [
				{ type: "callback", callback: updateStatus, text: getText, css: "btn_switch", tip: statusTip },
				"modify",
				{ type:'iframe', url: "/autoassignuser?id={eid}", text: "查看用户名单", css: "btn_view", width: "30%", height: "570px", enable: deleteEnable, tip: ""  },
				{ type: "delete", tip: deleteTip, enable: deleteEnable, text: "删除", css: "btn_delete" }
			],
			modifyStructure: { module: "module", title: "title", categoryid: "categoryid", content: "content", type: "[type]", status: "status" },
			modifyDialogWidth: 450,
			validateRule: {
				"auto_amount[]": {
					digits: true,
					min: 0
				}
			},
			validateMessages: {
				"auto_amount[]": {
					digits: "密钥数量必须为正整数",
					min: "密钥数量必须为正整数"
				}
			},
			addLoad: function(func) {
				$.post("/autoassign/getkeys", function(ret) {
					var table = $("table", "#dlg_new");
					table.empty();
					initDialog(null, ret, table);
					func();
				}, "json")
			},
			modifyLoad: function(eid, func) {
				$.post("/autoassign/getkeys", {"eid": eid}, function(ret) {
					var table = $("table", "#dlg_new");
					table.empty();
					initDialog(eid, ret, table);
					func();
				}, "json");
			}
		});

	});
</script>

@actions (array('title' => '密钥自动分配管理', 'action' => '自动分配'))


@dialog

@enddialog