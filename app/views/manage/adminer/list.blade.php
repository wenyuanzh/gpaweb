<script type="text/javascript">
	$(function() {
		var updateStatus = function(eid) {
			$.post("/adminer/status", { "eid": eid }, function() {
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

		var updateStatusTip = function(row) {
			switch (row["status"] >> 0) {
				case 1:
					return "修改管理员状态为\"禁用\"<br/><span class='subtip_1'>禁用后, 该管理员将不能登录管理后台</span>";
				case 2:
					return "修改管理员状态为\"正常\"<br/><span class='subtip_1'>启用后, 管理员可以正常登录后台, 并且拥有分配权限</span>";
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
			tableStructure: {
				eid: "adminerid",
				columns: [
					{ "key": "adminerid", "header": "编号", "class": "number" },
					{ "key": "name", "header": "账号", "headertip": "管理员登录账号" },
					{ "key": "role_text", "header": "权限", "headertip": "管理员所有权限" },
					{ "key": "status_text", "header": "状态", "class": "state", "headertip": "<strong>正常</strong>: 管理员可以正常后台管理<br/><strong>锁定</strong>: 管理员不能登录后台管理", "valueclass": statusValueClass },
					{ "key": "createdate", "header": "创建时间", "class": "time" }
				]
			},
			category: "管理员",
			operators: [
				{ type: "callback", callback: updateStatus, text: getText, css: "btn_switch", tip: updateStatusTip },
				{ type: "modify", tip: "编辑管理员信息", text: "编辑", css: "btn_modify" },
				{ type: "delete", tip: "删除管理员", text: "删除", css: "btn_delete" }
			],
			modifyStructure: { name: "name", role: "[role]", status: "status" },
			modifyDialogWidth: 600,
			validateRule: {
				name: { required: true },
				status: { required: true },
				password: { required: true }
			},
			modifyUnvalidateRules: [ "password" ],
			validateMessages: {
				name: {
					required: "名称不能为空"
				},
				status: {
					required: "请选这状态"
				},
				password: {
					required: "密码不能为空"
				}
			}
		});
	});

</script>

@actions (array('title' => '高级管理员管理', 'action' => '管理员'))

@search
	array('label' => '账号', 'type' => 'textbox', 'name' => 'name')
@endsearch

@dialog
	array('label' => '名称', 'type' => 'textbox', 'name' => 'name'),
	array('label' => '密码', 'type' => 'textbox', 'name' => 'password'),
	array('label' => '包含权限', 'type' => 'checklist', 'name' => 'role', 'values' => Ca\Consts::$adminer_role_texts),
	array('label' => '状态', 'type' => 'select', 'name' => 'status', 'values' => Ca\Consts::$adminer_status_texts)
@enddialog