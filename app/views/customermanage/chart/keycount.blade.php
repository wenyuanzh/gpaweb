<script type="text/javascript">
	var _selects = [];
	var _chartOption = {
		chart: {
			renderTo: "chart",
			type: 'column'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: []
		},
		yAxis: {
			min: 0,
			allowDecimals:false,
			title: {
				text: '数量 (个)'
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
				dataLabels : {
					enabled : true
				}
			}
		},
		series: []
	};
</script>

@actions (array('title' => '密钥总量', 'buttons' => array('export')))


