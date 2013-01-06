
<style type="text/css">
.chart {
	margin-bottom: 50px;
	height: 300px;
}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		var workout_data = <?php echo json_encode($workout_data) ?>;

		var $newRow;
		var name;
		for(name in workout_data) {
			$newRow = $('<div></div>').appendTo($(".charts"));

			new Highcharts.Chart({
				chart: {
					renderTo: $('<div class="chart"></div>').appendTo($newRow)[0],
					type: "line",
					backgroundColor: "#002b36"
				},
				title: {
					text: name,
					style: {color: "#268bd2"}
				},
				legend: {
					enabled: false
				},
				xAxis: {
					type: "datetime",
					title: {
						text: "Date",
						style: {color: "#b58900"}
					}
				},
				yAxis: {
					title: {
						text: "Weight",
						style: {color: "#b58900"}
					}
				},
				series: [{
					name: name,
					data: workout_data[name]
				}],
				plotOptions: {
					line: {
						color: "#2aa198"
					}
				}
			});
		}
		
	});
</script>

<div class="container">
	<div class="drock-content">
		<legend>Analysis</legend>
		<div class="charts"></div>
	</div>
</div>



