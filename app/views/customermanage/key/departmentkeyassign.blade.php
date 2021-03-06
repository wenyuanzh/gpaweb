<script type="text/javascript">
	var visible = @if (Input::get("inner")) false @else true @endif;
	var logView = @if (Input::get("log") == 1) true @else false @endif;
	var keyId = "{{ Input::get('keyid') }}";
	var departmentId = "{{ $department_id }}";
	var managerdepartment = "{{ $managerdepartment }}";
	var disabledFields = [@if (Input::get("inner")) "departmentid" @endif];
	var defaultValues = {{ $department_id ? '{ "departmentid": ' . $department_id . ' }' : "{}" }};

	$(function() {
		var dlgRetrieve =  $("#dlg_retrieve");
		var retrieveValidate = $("form", dlgRetrieve).validate({
			errorClass: "error_1",
			errorPlacement: function(error, element) {
				error.appendTo(element.parent("td").next("td"));
			},
			rules: {
				retrievecount: {
					required: true,
					digits: true,
					min: 1,
					max: 0
				}
			},
			messages: {
				retrievecount: {
					required: "收回数量不能为空",
					digits: "收回数量格式不对",
					max: "收回数量已不足",
					min: "收回数量不能低于1个"
				}
			}
		});
		dlgRetrieve.on("dialogclose", function() {
			retrieveValidate.resetForm();
			$(".error_1", dlgRetrieve).removeClass("error_1");
			$("#retrievecount", dlgRetrieve).val("");
		});
		$(".submit", dlgRetrieve).click(function() {
			var eid = $("#retrievecount", dlgRetrieve).attr("eid");
			var count = $("#retrievecount", dlgRetrieve).val();
			if ($("form", dlgRetrieve).valid()) {
				$.post("/departmentkeyassign/retrieve", {"eid": eid, "count": count}, function(ret) {
					dlgRetrieve.dialog("close");
					backend.list();
				});
			}
		});
		var retrieve = function(eid) {
			var row = $("tr[eid=" + eid +"]");
			$("#department").val($("td:eq(1)", row).text());
			$("#key").val($("td:eq(4)", row).text());
			$.post("/departmentkeyassign/retrieve", {"eid": eid}, function(ret) {
				$("#retrievecount", dlgRetrieve)
					.attr("placeholder", "可收回数量: " + ret.remain)
					.attr("eid", eid)
					.rules("add", {
						max: ret.remain >> 0
				});
				dlgRetrieve.dialog("open");
			});
		};
		var retrieveEnable = function(row) {
			return row["count"] > 0 && row["parentid"] == managerdepartment;
		};

		var retrieveTip = function(row) {
			return retrieveEnable(row) ? "收回已分配次数" : (row["count"] > 0 ? "只能回收直属部门的密钥" : "无可以收回次数" );
		};
		var logViewUrl = function(row) {
			return "/departmentkeyassign?id=" + row["departmentid"] + "&keyid=" + row["keyid"] + "&log=1";
		};

		var countValueClass = function(row) {
			if (row["count"] > 0) return "green";
			return "red";
		};

		var backend = $.backend({
			listParams: { "departmentid": departmentId, "log": logView ? 1 : 0, "keyid": keyId },
			tableStructure: {
				eid: "departmentkeyid",
				struct: ["departmentkeyid", "department_name", "product_name", "type", "key_name", "count", "assigndate"],
				columns: [
					{ "key": !logView ? "departmentkeyid_keyid" : "departmentkeyid", "header": "编号", "class": "number" },
					{ "key": "department_name", "header": "部门", "visible": visible, "headertip": "获得激活次数分配的部门" },
					{ "key": "product_name", "header": "商品", "headertip": "分配的商品" },
					{ "key": "type", "header": "激活类型", "headertip": "<strong>定时激活</strong>: 需要在180天后再次运行客户端激活<br/><strong>永久激活</strong>: 激活后永久保持激活状态" },
					{ "key": "key_name", "header": "密钥名称", "headertip": "分配的密钥名称" },
					{ "key": "count", "header": !logView ? "分配量" : "分配/收回量", "class": "count", "headertip": !logView ? "分配给该部门的激活次数" : "<strong>正数</strong>: 分配给该部门的激活次数<br/><strong>负数</strong>: 收回该部门的激活次数", "valueclass": countValueClass },
					{ "key": "assigndate", "header": "分配日期", "class": "time" }
				]
			},
			showSearchBar: !logView,
			dialogWidth: 350,
			modifyDialogWidth: 350,
			category: "部门激活分配",
			selects: [ "productid", "keyid", "departmentid" ],
			modifyStructure: { keyid: "keyid", assigncount: "assigncount", status: "status" },
			operators: [
				!logView ? { type: "iframe", url: logViewUrl, text: "分配记录", css: "btn_view", width: "80%", height: "570px", tip: "该部门激活分配记录" } : "",
				!logView ? { type: "callback", callback: retrieve, text: "收回", css: "btn_delete", enable: retrieveEnable, "tip": retrieveTip } : ""
			],

			newDisabledFields: disabledFields,
			modifyDisabledFields: disabledFields,
			actionDisabledFields: disabledFields,
			newDefaultValues: defaultValues,
			searchDefaultValues: defaultValues,
			validateRule: {
				departmentid: {
					required: true
				},
				keyid: {
					required: true
				},
				status: {
					required: true
				},
				assigncount: {
					required: true,
					digits: true,
					min: 1,
					max: 0
				}
			},
			validateMessages: {
				keyid: {
					required: "密钥不能为空"
				},
				departmentid: {
					required: "部门不能为空"
				},
				assigncount: {
					required: "分配数量不能为空",
					digits: "分配数量格式不对",
					max: "分配数量已不足",
					min: "分配数量不能低于1个"
				}
			}
		});

		var dlgNew = $("#dlg_new");
		var select = $("div#dlg_new #keyid");
		$(".button_add").click(function() {
			$("*", select).remove();
			$("#keyid", dlgNew).prop("disabled", true).addClass("disabled");
			$("#assigncount").prop("disabled", true).addClass("disabled").removeAttr("placeholder");
			$("#departmentid").trigger("change");
		});
		$("#departmentid").change(function() {
			var departmentid = $(this).val();
			if (departmentid == "") {
				$("#keyid option:eq(0)", dlgNew).prop("selected", true);
				$("#keyid", dlgNew).prop("disabled", true).addClass("disabled");
				$("#assigncount").prop("disabled", true).addClass("disabled");
			} else {
				$("#keyid", dlgNew).prop("disabled", false).removeClass("disabled");
				$("#assigncount").prop("disabled", false).removeClass("disabled");
				$("*", select).remove();
				$.post("/departmentkeyassign/keys", { "departmentid" : departmentid }, function(ret) {
					$("<option />").val("").text("请选择").appendTo(select);
					$.each(ret[0], function(i, item) {
						$("<option />").attr("remain", item["remain"]).text(item.name).val(item.keyid).appendTo(select);
					});
					$("#keyid", dlgNew).prop("disabled", false).removeClass("disabled");
					$("#assigncount").prop("disabled", false).removeClass("disabled");
				}, "json");
			}
		});
		$("#keyid", dlgNew).change(function() {
			var self = $(this);
			var remain = $(":selected", self).attr("remain") >> 0;
			$("#assigncount").attr("placeholder", "可分配数量:" + remain).focus().rules("add", {
				max: remain
			});
		});
	});
</script>
@actions (array('title' => (empty($department_name) ? '部门激活分配' : '部门: ' . $department_name), 'action' => '分配', 'buttons' => Input::get("log") == 1 ? array() : array('add')))

@search
array('label' => '部门', 'type' => 'select', 'name' => 'departmentid'),
array('label' => '商品', 'type' => 'select', 'name' => 'productid'),
array('label' => '分配密钥', 'type' => 'select', 'name' => 'keyid')
@endsearch

@dialog
array('label' => '部门', 'type' => 'select', 'name' => 'departmentid'),
array('label' => '密钥', 'type' => 'select', 'name' => 'keyid'),
array('label' => '分配数量', 'type' => 'textbox', 'name' => 'assigncount'),
@enddialog

<div id="dlg_retrieve" class="dialog_1">
	<h1>收回密钥</h1>
	<form>
		<table>
			<tr>
				<td class="label"><label for="">部门：</label></td><td colspan="1"><input type="text" class="textbox_1 disabled" id="department" disabled /></td>
				<td class="error"></td><tr><td class="label"><label for="">密钥：</label></td><td colspan="1"><input type="text" class="textbox_1 disabled" id="key" disabled /></td>
				<td class="error"></td><tr><td class="label"><label for="">收回数量：</label></td><td colspan="1"><input class="textbox_1" type="text" id="retrievecount" name="retrievecount" placeholder="回收数量"/></td>
				<td class="error"></td>
			</tr>
		</table>
	</form>
	<div class="actions"><a href="#" class="button_1 button_1_a submit">确定</a><a href="#" class="button_1 button_1_a close">取消</a></div><a href="#" class="close header_close"></a></div>
</div>
