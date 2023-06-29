<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$fc = "SELECT * FROM tbl_file_complaint";
$fcr = $connection->query($fc);
$fcr2 = $connection->query($fc);
$fcr3 = $connection->query($fc);

$schedules = $connection->query("SELECT * FROM tbl_schedules sc, tbl_events ev, tbl_file_complaint fc WHERE sc.event_id = ev.event_id AND sc.fc_id = fc.fc_id");
$sched_res = [];
foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
	$row['sdate'] = date("F d, Y", strtotime($row['start_date']));
	if ($row['fc_type'] == '0') {
		$resident = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '{$row['comp_id']}'")->fetch_assoc();
		$row['complainant_name'] = $resident['res_lname'] . ', ' . $resident['res_fname'];
	} else {
		$nresident = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '{$row['comp_id']}'")->fetch_assoc();
		$row['complainant_name'] = $nresident['nres_lname'] . ', ' . $nresident['nres_fname'];
	}
	$resident = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '{$row['resp_id']}'")->fetch_assoc();
	$row['respondent_name'] = $resident['res_lname'] . ', ' . $resident['res_fname'];

	$sched_res[$row['fc_id'] . $row['event_id']] = $row;
}
$events = $connection->query("SELECT * FROM tbl_events LIMIT 0, 2");

$events2 = "SELECT * FROM tbl_events LIMIT 0, 2";
// $events_r2 = $connection->query($events2);

$remarks = $connection->query("SELECT * FROM tbl_remarks");
?>
<style>
	.fc .fc-daygrid-body-unbalanced .fc-daygrid-day-events {
		height: 50px !important;
		/* Adjust this value as needed */
	}

	#remarks {
		width: 100px !important;
	}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1 class="m-0">Schedules</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content pb-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3 bg-warning">
						<h6 class="m-0 font-weight-bold text-dark">CALENDAR</h6>
					</div>
					<div class="card-body">
						<?php include 'assets/modals/add-schedule-modal.php' ?>
						<?php //include 'assets/modals/view-schedule-modal.php' 
						?>
						<?php //include 'assets/modals/update-schedule-modal.php' 
						?>
						<!-- Event Details Modal -->
						<div class="modal fade" data-backdrop="static" id="event-details-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Schedule Details</h5>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body rounded-0">
										<div class="container-fluid">
											<input type="hidden" name="schedule_id" id="schedule_id" class="schedule_id" value="">
											<dl>
												<dt class="text-muted d-flex">ENTRY NO.
													<div class="dropdown ml-auto">
														<button class="btn btn-secondary btn-xs dropdown-toggle dropdown-pill" type="button" id="remarks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														</button>
														<div class="dropdown-menu" aria-labelledby="remarks">
															<button class="dropdown-item" type="button" id="settled" data="1">Settled</button>
															<button class="dropdown-item" type="button" id="not_settled" data="0">Not Settled</button>
														</div>
													</div>
												</dt>
												<dd id="fc_id" class="fw-bold fs-4 file_complaint_id"></dd>
												<dt class="text-muted">COMPLAINANT</dt>
												<dd id="complainant_name" class="fw-bold"></dd>
												<dt class="text-muted">RESPONDENT</dt>
												<dd id="respondent_name" class="fw-bold"></dd>
												<dt class="text-muted">WHAT</dt>
												<dd id="description" class=""></dd>
												<dt class="text-muted">WHEN</dt>
												<dd id="start" class=""></dd>
											</dl>

										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default btn-sm rounded-0" data-dismiss="modal">Close</button>
										<!-- <button type="button" class="btn btn-secondary btn-sm rounded-0" id="reschedule"><i class="bi bi-pencil-square me-1"></i>Reschedule</button> -->
										<button type="button" class="btn btn-warning btn-sm rounded-0" id="edit"><i class="bi bi-pencil-square me-1"></i>Edit</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Event Details Modal -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12" id="page-calendar">
								<div id="calendar"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
if (isset($connection)) $connection->close();
?>
<script>
	var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
</script>
<script src="./assets/js/script.js"></script>
<script>
	$(document).ready(function() {
		$('#insertSchedule').on('submit', function(e) {
			e.preventDefault();
			var insertSchedule = $('#insertSchedule').serialize();
			console.log(insertSchedule)
			swal.fire({
				title: "Add this schedule?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#28a745',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-schedule-query.php",
						data: insertSchedule,
						success: function(data) {
							var response = JSON.parse(data);
							console.log(data);
							if (response.success_flag == 0) {
								toastr.error(response.message)
							} else {
								toastr.success(response.message);

								setTimeout(function() {
									window.location.reload();
								}, 2000);
							}
						}
					});
				} else {
					e.dismiss;
				}
			}, function(dismiss) {
				return false;
			})
		})
		$('.dropdown-item').on('click', function() {
			var remarks_val = $(this).attr('data')
			var fc_id = $('#event-details-modal').find('#fc_id').text()
			var active_val = $('.dropdown').find('.active').attr('data')
			$('.dropdown #settled').removeClass('active')
			$('.dropdown #not_settled').removeClass('active')
			$('#remarks').removeClass('btn-warning')
			$('#remarks').removeClass('btn-success')
			var remarks
			if ($(this).attr('data') == 0) {
				remarks = "Not Settled"
				$('.dropdown #not_settled').addClass('active')
				$('#remarks').addClass('btn-warning')
			} else {
				remarks = "Settled"
				$('.dropdown #settled').addClass('active')
				$('#remarks').addClass('btn-success')
			}
			$('#remarks').text(remarks)
			console.log(active_val + ' = ' + remarks_val)
			if (remarks_val != active_val) {
				$.ajax({
					method: 'POST',
					url: 'config/queries/update-schedule-remarks-query.php',
					data: {
						remarks: remarks_val,
						fc_id: fc_id
					},
					success: function(data) {
						var response = JSON.parse(data)
						if (response.success_flag == 0) {
							toastr.error(response.message)
						} else {
							toastr.success(response.message);
						}
					}
				})
			}
		})
	})
</script>
<?php
include 'layouts/footer.php';
?>