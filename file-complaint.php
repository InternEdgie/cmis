<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$fc = $connection->query("SELECT * FROM tbl_file_complaint");

$respondents = $connection->query("SELECT * FROM tbl_residents");
$zone_list = $connection->query("SELECT * FROM tbl_zone");
?>
<style>
	#select2-resp_id-result-wr9p-0 {
		color: green !important;
	}
</style>
<div id="content">

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">FILE COMPLAINTS </h1>
			<a href="#" class="btn btn-sm btn-danger btn-icon-split shadow-sm" data-toggle="modal" data-target="#fileComplaintModal">
				<span class="icon text-white-50">
					<i class="fas fa-file-alt"></i>
				</span>
				<span class="text">File Complaint</span>
			</a>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-danger">
				<h6 class="m-0 font-weight-bold text-white">LIST OF FILED COMPLAINTS</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped border text-dark" id="table_desc" width="100%">
						<thead class="bg-gray-900 text-white">
							<tr>
								<th>Entry No.</th>
								<th>Complainant</th>
								<th>Respondent</th>
								<th>Nature of Case</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = $fc->fetch_assoc()) : ?>
								<tr>
									<th class="align-middle"><?= $row['fc_id']; ?></th>
									<td>
										<?php
										$comp_id = $row['comp_id'];
										if ($row['fc_type'] == 0) {
											$c_res = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$comp_id'")->fetch_assoc();
											$comp_fullname = $c_res['res_fname'] . ' ' . $c_res['res_mname'] . ' ' . $c_res['res_lname'];
										} else if ($row['fc_type'] == 1) {
											$c_nres = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '$comp_id'")->fetch_assoc();
											$comp_fullname = $c_nres['nres_fname'] . ' ' . $c_nres['nres_mname'] . ' ' . $c_nres['nres_lname'];
										}
										echo $comp_fullname;
										?>
									</td>
									<td>
										<?php
										$resp_id = $row['resp_id'];
										$residents = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$resp_id'")->fetch_assoc();
										$resp_fullname = $residents['res_fname'] . ' ' . $residents['res_mname'] . ' ' . $residents['res_lname'];
										echo $resp_fullname;
										?>
									</td>
									<td>
										<?php
										$com = $row['com_id'];
										$c_query = "SELECT * FROM tbl_complaint_type WHERE com_id = '$com'";
										$c = $connection->query($c_query)->fetch_assoc();
										$com_type = $c['com_name'];
										if (strlen($com_type) >= 15) {
											echo substr($com_type, 0, 15,) . '...';
										} else {
											echo $com_type;
										}

										?>
									</td>
									<td>
										<?php
										$s_fc_id = $row['fc_id'];
										$schedule = "SELECT * FROM tbl_schedules WHERE fc_id = '$s_fc_id'";
										$check_sched = $connection->query($schedule);

										if ($check_sched->num_rows > 0) {
											$fc_status_id = $row['status_id'];
											$status = "SELECT * FROM tbl_status";
											$status_r = $connection->query($status);
											if ($fc_status_id != 0) {
												while ($statdata = $status_r->fetch_assoc()) {
													if ($fc_status_id == $statdata['status_id']) {
														echo $statdata['status_name'];
													}
												}
											} else {
												echo "---";
											}
										} else {
											echo "<span class='text-muted'>Set Schedule</span>";
										}
										?>
									</td>
									<td>
										<?php
										if ($check_sched->num_rows > 0) {
										?>
											<a href="#" class="btn btn-sm btn-success shadow-sm"><i class="bi bi-calendar-check"></i></a>
										<?php
										} else {
										?>
											<a href="#" class="btn btn-sm btn-secondary shadow-sm"><i class="bi bi-calendar-x text-white-50"></i></a>
										<?php
										}

										if ($_SESSION['role'] == 1) {
										?>
											<a href="#" class="btn btn-sm btn-primary shadow-sm"><i class="bi bi-printer"></i></a>
										<?php
										}
										?>
										<a href="view-file-complaint.php?id=<?= $row['fc_id'] ?>" class="btn btn-sm btn-info shadow-sm"><i class="bi bi-info-circle fa-sm"></i></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
						<tfoot class="bg-gray-900 text-white">
							<tr>
								<th>Entry No.</th>
								<th>Complainant</th>
								<th>Respondent</th>
								<th>Nature of Case</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#first_next').on('click', function(e) {
			e.preventDefault()
		})

		$('#first_prev').on('click', function(e) {
			e.preventDefault()
		})
		$('#second_next').on('click', function(e) {
			e.preventDefault()
		})

		$('#second_prev').on('click', function(e) {
			e.preventDefault()
		})

		$('#resp_id').on('change', function() {
			$resp_id = $(this).val()

			if($resp_id == 0) {
				$('#add-resident').removeAttr('d-none')
			}
		})
	})
	document.addEventListener('DOMContentLoaded', function() {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	})
</script>
<?php
include 'assets/modals/add-complaint-modal.php';
include 'layouts/footer.php';
?>