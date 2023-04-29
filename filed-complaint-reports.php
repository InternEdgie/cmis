<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

if (isset($_POST['com_id']) && isset($_POST['status']) && isset($_POST['range']) && $_POST['range'] != "") {
	$com_id = $_POST['com_id'];
	$status_id = $_POST['status'];
	$range = $_POST['range'];
	$start = date('Y-m-d', strtotime(substr($range, 0, 10)));
	$end = date('Y-m-d', strtotime(substr($range, 13, 10)));
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE com_id = '$com_id' AND status_id = '$status_id' AND DATE_FORMAT(fc_regdatetime, '%Y-%m-%d') BETWEEN '$start' AND '$end'");
} else if (isset($_POST['com_id']) && isset($_POST['status'])) {
	$com_id = $_POST['com_id'];
	$status_id = $_POST['status'];
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE com_id = '$com_id' AND status_id = '$status_id'");
} else if (isset($_POST['com_id']) && isset($_POST['range']) && $_POST['range'] != "") {
	$com_id = $_POST['com_id'];
	$range = $_POST['range'];
	$start = date('Y-m-d', strtotime(substr($range, 0, 10)));
	$end = date('Y-m-d', strtotime(substr($range, 13, 10)));
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE com_id = '$com_id' AND DATE_FORMAT(fc_regdatetime, '%Y-%m-%d') BETWEEN '$start' AND '$end'");
} else if (isset($_POST['status']) && isset($_POST['range']) && $_POST['range'] != "") {
	$status_id = $_POST['status'];
	$range = $_POST['range'];
	$start = date('Y-m-d', strtotime(substr($range, 0, 10)));
	$end = date('Y-m-d', strtotime(substr($range, 13, 10)));
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE status_id = '$status_id' AND DATE_FORMAT(fc_regdatetime, '%Y-%m-%d') BETWEEN '$start' AND '$end'");
} else if (isset($_POST['com_id'])) {
	$com_id = $_POST['com_id'];
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE com_id = '$com_id'");
} else if (isset($_POST['status'])) {
	$status_id = $_POST['status'];
	$range = $_POST['range'];
	$start = date('Y-m-d', strtotime(substr($range, 0, 10)));
	$end = date('Y-m-d', strtotime(substr($range, 13, 10)));
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE status_id = '$status_id'");
} else if (isset($_POST['range']) && $_POST['range'] != "") {
	$range = $_POST['date_range'];
	$start = date('Y-m-d', strtotime(substr($range, 0, 10)));
	$end = date('Y-m-d', strtotime(substr($range, 13, 10)));
	$fc = $connection->query("SELECT * FROM tbl_file_complaint WHERE DATE_FORMAT(fc_regdatetime, '%Y-%m-%d') BETWEEN '$start' AND '$end'");
} else {
	$fc = $connection->query("SELECT * FROM tbl_file_complaint");
}

$nature = $connection->query("SELECT * FROM tbl_complaint_type");

$com_type = $connection->query("SELECT * FROM tbl_complaint_type a, tbl_file_complaint b WHERE a.com_id = b.com_id");
$status = $connection->query("SELECT * FROM tbl_status a");
?>
<style type="text/css">
	.form-control::-webkit-input-placeholder {
		color: #212529 !important;
		opacity: 1;
	}

	.form-control::-moz-placeholder {
		color: #212529 !important;
		opacity: 1;
	}

	.form-control:-ms-input-placeholder {
		color: #212529 !important;
		opacity: 1;
	}

	.form-control::-ms-input-placeholder {
		color: #212529 !important;
		opacity: 1;
	}

	.form-control::placeholder {
		color: #212529 !important;
		opacity: 1;
	}

	table {
		font-size: 11px;
	}

	@media print {
		table {
			background-color: blue !important;
		}
	}
</style>
<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center mb-4">
			<button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print">
				<span class="icon">
					<i class="bi bi-printer"></i>
				</span>
				<span class="text">Print</span>
			</button>
		</div>
		<?php include 'config/message.php'; ?>
		<div id="printThis">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold card-title">FILED COMPLAINT REPORTS</h6>
				</div>
				<div class="card-body">
					<div class="mb-3 border-bottom pb-3 d-print-none">
						<form method="POST" action="filed-complaint-reports.php">
							<div class="row">
								<div class="col-sm-1 align-self-center">
									Sort by:
								</div>
								<div class="col-sm">
									<select class="form-control select2" name="com_id" id="com_id">
										<option value="" disabled selected>Nature of the Case</option>
										<?php while ($row = $com_type->fetch_assoc()) : ?>
											<option value="<?= $row['com_id'] ?>" <?= isset($com_id) && $row['com_id'] == $com_id ? 'selected' : '' ?>><?= $row['com_name'] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
								<div class="col-sm">
									<select class="form-control select2" name="status" id="status">
										<option value="" disabled selected>Status</option>
										<?php while ($row = $status->fetch_assoc()) : ?>
											<option value="<?= $row['status_id'] ?>" <?= isset($status_id) && $row['status_id'] == $status_id ? 'selected' : '' ?>><?= $row['status_name'] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
								<div class="col-sm align-self-center">
									<input type="text" name="range" class="form-control" id="reportrange" style="cursor: pointer; background-color: white" placeholder="Date Range" value="<?= isset($_POST['range']) && $_POST['range'] != '' ? $_POST['range'] : '' ?>" readonly>
								</div>
								<div class="col-sm-1 align-self-center">
									<button type="submit" class="btn btn-sm btn-primary" name="search"><i class="bi bi-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<div class="table-responsive">
						<table class="table table-striped border-0" id="table_desc" width="100%">
							<thead class="bg-gray-900 text-white border-0">
								<tr>
									<th>Entry No.</th>
									<th>Complainant</th>
									<th>Respondent</th>
									<th>Nature of Case</th>
									<th>Status</th>
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
								</tr>
							</tfoot>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<noscript id="print-header">
	<div class="justify-content-center">
		<table class="w-100 mb-5">
			<tr>
				<td rowspan="6" style="width:10%"><img src="assets/img/logo.png" width="100" class="img-fluid" /></td>
				<td style="width:80%">
					<h6 class="mb-0 h6 text-center">Republic of the Philippines</h6>
				</td>
				<td rowspan="6" style="width:10%"></td>
			</tr>
			<tr>
				<td>
					<h6 class="mb-0 text-center">Province of Misamis Oriental</h6>
				</td>

			</tr>
			<tr>
				<td>
					<h6 class="mb-0 text-center">City of Cagayan de Oro</h6>
				</td>

			</tr>
			<tr>
				<td>
					<h6 class="mb-0 h6 font-weight-bold text-center">OFFICE OF LUPONG TAGAPAMAYAPA</h6>
				</td>

			</tr>
			<tr>
				<td>
					<h5 class="fw-bold mb-0 font-weight-bold text-center">BARANGAY MACABALAN</h5>
				</td>

			</tr>
			<tr>
				<td class="text-center font-italic">
					<h7>Tel No. 881-2209</h7>
				</td>
			</tr>
		</table>
	</div>
</noscript>
<script>
	$(document).ready(function() {
		$('#print').click(function() {
			// start_loader();
			var _h = $('head').clone()
			var _p = $('#printThis').clone()
			var _ph = $($('noscript#print-header').html()).clone()
			var _el = $('<div>')
			_p.find('.card').removeClass('shadow card')
			_p.find('.card-header').removeClass('card-header')
			_p.find('.card-body').removeClass('card-body')
			_p.find('h6.card-title').addClass('text-center h5')
			_p.find('.dataTables_filter').addClass('d-none')
			_p.find('.dataTables_length').addClass('d-none')
			_p.find('.dataTables_info').addClass('d-none')
			_p.find('.dataTables_paginate').addClass('d-none')
			_p.find('.dataTable').removeClass('dataTable')
			_p.find('.hide-on-print').addClass('d-none')
			_p.find('th').addClass('text-black')
			_p.find('table').removeClass('border-0').addClass('border')
			_el.append(_h)
			_el.append(_ph)
			_el.find('title').text('Resident Profile')
			_el.append(_p)

			var nw = window.open('', '_blank', 'width=1000,height=900,top=50,left=200')
			nw.document.write(_el.html())
			nw.document.close()

			setTimeout(() => {
				nw.print()
				setTimeout(() => {
					nw.close()
					// end_loader()
					// $('.table').dataTable({
					// 	columnDefs: [
					// 	{ orderable: false, targets: 5 }
					// 	],
					// });
				}, 300);
			}, (750));
		});
	});
	$(function() {
		$('#reportrange').daterangepicker({
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			},
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		});

		$('input[name="range"]').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		$('input[name="range"]').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

	});
	// toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
</script>
<?php
include 'assets/modals/edit-residents-modal.php';
// include 'assets/modals/import-residents-modal.php';
include 'layouts/footer.php';
?>