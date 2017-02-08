<script type="text/javascript">
	$(function() {
		var defaultparams = function(eid) {
			$.post("/customersetting/defaultparams", { "eid": eid, "id": '{{ $customerid }}' }, function() {
				backend.list();
			});
		};

		var backend = $.backend({
			listParams: { "id": "{{ $customerid }}" },
			tableStructure: {
				eid: "key",
				columns: [
					{ "key": "", "header": "" },
					{ "key": "key_info", "header": "参数名", "class": "text text150" },
					{ "key": "defaultvalue", "header": "默认参数值" },
					{ "key": "customervalue", "header": "客户参数值" }
				]
			},
			category: "参数",
			operators: [
				"modify",
				{ type: "callback", callback: defaultparams, text: "默认", css: "btn_modify", confirm: true, confirmText: "你确定要恢复默认值吗？" }
			],
			modifyStructure: { value: "value" },
			validateRule: {
				"auto_amount[]": {
					digits: true,
					min: 0
				},
				autoassignopen: {
					digits: true,
					range: [0, 1]
				},
				canapplykey: {
					digits: true,
					range: [0, 1]
				},
				changepassword: {
					digits: true,
					range: [0, 1]
				},
				register: {
					digits: true,
					range: [0, 1]
				},
				retrievepassword: {
					digits: true,
					range: [0, 1]
				},
				showemail: {
					digits: true,
					range: [0, 1]
				}
			},

			validateMessages: {
				"auto_amount[]": {
					digits: "密钥数量必须为正整数",
					min: "密钥数量必须为正整数"
				},
				autoassignopen: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				},
				canapplykey: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				},
				changepassword: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				},
				register: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				},
				retrievepassword: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				},
				showemail: {
					digits: "该参数值只能为0或1",
					range: "该参数值只能为0或1"
				}
			},
			modifyLoad: function(eid, func) {
				$.post("/customersetting/getvalue", {"customerid": "{{ $customerid }}", "key": eid}, function(ret) {
					var table = $("table", "#dlg_new");
					table.empty();
					if (ret.key == "autoassignkeys") {
						if (ret.value != "[]" && ret.value != "") {
							var autoassignkeys = jQuery.parseJSON(ret.value);
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
									)
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
									)
								tr.append(td_2);

								var td_3 = $("<td/>").addClass("error");
								tr.append(td_3);

								table.append(tr);
							});
						}
						else table.append($("<tr/>").append($("<td/>").html("无可用密钥")));
						table.append($("<input/>").attr({ "type": "hidden", "name": "customerid" }).val("{{ $customerid }}"));
					}
					else {
						var tr = $("<tr/>");
						var td_1 = $("<td/>");
						td_1
							.addClass("label")
							.append(
								$("<label />").html("参数值：")
							);
						tr.append(td_1);

						var td_2 = $("<td/>");
						td_2
							.attr("colspan", "1")
							.append(
								$("<input/>")
									.attr({ "id": eid, "type": "text", "name": eid })
									.addClass("textbox_1")
									.val(ret.value)
							)
							.append(
								$("<input/>")
									.attr({ "type": "hidden", "name": "customerid" })
									.addClass("textbox_1")
									.val("{{ $customerid }}")
							);
						tr.append(td_2);

						var td_3 = $("<td/>").addClass("error");
						tr.append(td_3);

						table.append(tr);
					}
					func();
				}, "json");
			}

		});
	});
</script>

@actions (array('title' => '客户: ' . $customer->name, 'action' => '客户', 'buttons' => array()))

@dialog

@enddialog