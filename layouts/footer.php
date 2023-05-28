			</div>
			<footer class="main-footer">
				<div class="container text-center">
					<strong>Copyright &copy; CMIS 2023.</strong>
					All rights reserved.
				</div>
			</footer>
		</div>
		<!-- Scroll to Top Button-->
		<!-- <a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a> -->
		
		<!-- Page level custom scripts -->
		<script src="assets/js/custom.js"></script>
		<!-- <script src="./assets/js/script.js"></script> -->
		<!-- <script src="assets/js/demo/chart-area-demo.js"></script>
			<script src="assets/js/demo/chart-pie-demo.js"></script> -->
			<script type="text/javascript">
			// Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#858796';

			<?php if (!empty($com_name) && !empty($com_count)): ?>
			const ctx = document.getElementById('filedCases');
			const com_short_name = <?= json_encode($com_short_name) ?>;
			const com_name = <?= json_encode($com_name) ?>;
			const com_count = <?= json_encode($com_count) ?>;
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: com_short_name,
					datasets: [{
						label: "Filed Cases",
						data: com_count,
						backgroundColor: "#4e73df",
						hoverBackgroundColor: "#2e59d9",
						borderColor: "#4e73df",
					}],
				},
				options: {
					maintainAspectRatio: false,
					layout: {
						padding: {
							left: 10,
							right: 25,
							top: 25,
							bottom: 0
						},
					},
					scales: {
						yAxes: [{
							ticks: {
								min: 0,
								maxTicksLimit: 5,
								padding: 10,
							},
						}],
					},
					legend: {
						display: false
					},
				},
				tooltips: {
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					caretPadding: 10,
					callbacks: {
						label: function(tooltipItem, chart) {
							var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
							return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
						}
					}
				},
			});
		<?php endif; ?>
		<?php if (!empty($event_name) && !empty($event_count) && !empty($event_color)): ?>
		const ctx2 = document.getElementById('events');
		const event_name = <?= json_encode($event_name) ?>;
		const event_count = <?= json_encode($event_count) ?>;
		const event_color = <?= json_encode($event_color) ?>;
		new Chart(ctx2, {
			type: 'doughnut',
			data: {
				labels: event_name,
				datasets: [{
					data: event_count,
					backgroundColor: event_color,
					hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
					hoverBorderColor: "rgba(234, 236, 244, 1)",
				}],
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					caretPadding: 10,
				},
				legend: {
					display: false
				},
				cutoutPercentage: 80,
			},
		});
	<?php endif; ?>
	$('.my-colorpicker2').colorpicker()

	$('.my-colorpicker2').on('colorpickerChange', function(event) {
		$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	})

	document.addEventListener("DOMContentLoaded", function() {
		setTimeout(function() {
			document.querySelector("body").classList.add("loaded");
		}, 10)
	});

</script>
</body>
</html>