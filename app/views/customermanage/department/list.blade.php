
<script type="text/javascript">
	var managerRole @if (Ca\Service\ManagerService::check_role('manager')) = true @endif;
	var userRole @if (Ca\Service\ManagerService::check_role('user')) = true @endif;
	var departmentkeyassignRole @if (Ca\Service\ManagerService::check_role('departmentkeyassign')) = true @endif;
	$(function() {
		var deleteTip = function(row) {
			return deleteEnable(row) ? "删除下级部门" : "部门内已创建相关信息, 无法删除<br/><span class='subtip_1'><strong>相关信息</strong>: 下级部门, 管理员, 用户, 激活信息</span>"
		};
		var deleteEnable = function(row) {
			return !(row["count"] > 0);
		};
		$.backend({
			tableStructure: {
				eid: "departmentid",
				columns: [
					{ "key": "departmentid", "header": "编号", "class": "number" },
					{ "key": "departmentid_text", "header": "名称", "headertip": "格式: 管理员所属部门 &gt; 下级部门" },
					{ "key": "department_count", "header": "直属部门", "class": "number", "headertip": "该部门直属部门数量<br/><span class='subtip_1'>(不包含下级部门)</span>" },
					{ "key": "manager_count", "header": "管理员", "class": "number", "headertip": "该部门管理员数量<br/><span class='subtip_1'>(只包含直属部门管理员)</span>" },
					{ "key": "user_count", "header": "用户", "class": "number", "headertip": "该部门用户数量<br/><span class='subtip_1'>(只包含该部门用户)</span>" },
					{ "key": "createdate", "header": "创建时间", "class": "time" }
				]
			},
			category: "下级部门",
			modifyStructure: { parentid: "parentid", name: "name" },
			modifyDisabledFields: [ "parentid" ],
			selects: [ "parentid" ],
			operators: [
				managerRole ? { type: "iframe", url: "/manager?id={eid}", text: "管理员", css: "btn_view", width: "90%", height: "570px", tip: "查看隶属于该部门的管理员"  } : "",
				userRole ? { type: "iframe", url: "/user?id={eid}", text: "用户", css: "btn_view", width: "80%", height: "570px", tip: "查看隶属于该部门的注册用户" } : "",
				departmentkeyassignRole ? { type: "iframe", url: "/departmentkeyassign?id={eid}", text: "激活分配", css: "btn_view", width: "80%", height: "700px" , tip: "查看该部门的激活分配信息" } : "",
				{ type: "modify", tip: "编辑下级部门信息", text: "编辑", css: "btn_modify" },
				{ type: "delete", tip: deleteTip, enable: deleteEnable, text: "删除", css: "btn_delete" }
			],
			validateRule: {
				name: {
					required: true,
					maxlength: 64
				},
				parentid: {
					required: true
				}
			},
			validateMessages: {
				name: {
					required: "名称不能为空",
					maxlength: "名称长度不得超过64"
				},
				parentid: {
					required: "请选择所属上级部门"
				}
			}
		});
	});
</script>
@actions (array('title' => '部门管理', 'action' => '部门', 'tooltip' => '管理 [' . Auth::user()->departmentname . '] 下级部门'))

@search
	array('label' => '名称', 'type' => 'textbox', 'name' => 'name', 'placeholder' => '下级部门名称')
@endsearch

@dialog
	array('label' => '上级部门', 'type' => 'select', 'name' => 'parentid'),
	array('label' => '名称', 'type' => 'textbox', 'name' => 'name', 'placeholder' => '新部门名称')
@enddialog