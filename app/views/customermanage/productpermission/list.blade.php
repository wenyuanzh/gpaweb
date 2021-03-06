<script type="text/javascript">
	$(function() {
		var backend = $.backend({
			tableStructure: {
				eid: "permissionid",
				columns: [
					{ "key": "permissionid", "header": "编号", "class": "number" },
					{ "key": "type_text", "header": "用户类型" },
					{ "key": "product_name", "header": "商品" }
				]
			},
			category: "商品权限",
			selects: [ 'productid' ],
			operators: [
				"modify",
				{ type: "delete", tip: "删除", text: "删除", css: "btn_delete" }
			],
			modifyStructure: { productid: "productid", type: "type" },
			modifyDialogWidth: 450,
			validateRule: {
				"type": {
					required: true
				},
				"productid": {
					required: true
				}
			},
			validateMessages: {
				"type": {
					required: "请选择类型"
				},
				"productid": {
					required: "请选择商品"
				}
			}
		});

	});
</script>

@actions (array('title' => '商品权限管理', 'action' => '商品权限'))

@search
array('label' => '用户类型', 'type' => 'select', 'name' => 'type', 'values' => \Ca\Consts::$user_type_text),
array('label' => '商品', 'type' => 'select', 'name' => 'productid'),
@endsearch


@dialog
array('label' => '用户类型', 'type' => 'select', 'name' => 'type', 'values' => \Ca\Consts::$user_type_text),
array('label' => '商品', 'type' => 'select', 'name' => 'productid'),
@enddialog