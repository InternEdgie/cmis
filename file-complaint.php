<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$fc = $connection->query("SELECT * FROM tbl_file_complaint");

$respondents = $connection->query("SELECT * FROM tbl_residents ORDER BY res_lname ASC");
$res_complainants = $connection->query("SELECT * FROM tbl_residents ORDER BY res_lname ASC");
$nres_complainants = $connection->query("SELECT * FROM tbl_non_residents ORDER BY nres_lname ASC");
$zone_list = $connection->query("SELECT * FROM tbl_zone");
$zone_list2 = $connection->query("SELECT * FROM tbl_zone");
$complaint_type = $connection->query("SELECT * FROM tbl_complaint_type ORDER BY com_name ASC");
$citizenship = $connection->query("SELECT * FROM tbl_citizenship");

$get_fc = "SELECT fc_regdatetime, fc_id FROM tbl_file_complaint ORDER BY fc_id DESC";
$rfc = $connection->query($get_fc)->fetch_assoc();
$current_year = date('Y');
if (!empty($rfc['fc_regdatetime']) && !empty($rfc['fc_id'])) {
	$last_year = date('Y', strtotime($rfc['fc_regdatetime']));
	$last_id = substr($rfc['fc_id'], 0, 3);

	for ($i = 1;; $i++) {
		if ($current_year != $last_year) {
			$id = $i;
		} else {
			if ($i == $last_id) {
				$id = $i + 1;
			} else {
				$id = $i + $last_id;
			}
		}
		break;
	}
	$fc_id = sprintf('%03d', $id) . '-' . $current_year;
} else {
	$fc_id = sprintf('%03d', 1) . '-' . $current_year;
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">File Complaints</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 align-self-center text-right">
				<a href="#" class="btn btn-sm btn-danger btn-icon-split shadow-sm" data-toggle="modal" data-target="#fileComplaintModal">
					<span class="icon text-white-50">
						<i class="fas fa-file-alt"></i>
					</span>
					<span class="text">File Complaint</span>
				</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content pb-5">
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-danger">
				<h6 class="m-0 font-weight-bold text-white">LIST OF FILED COMPLAINTS</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="table_desc" width="100%">
						<thead>
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
						<tfoot>
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
</section>

<script>
	$(document).ready(function() {
		$('#first_next').on('click', function(e) {
			e.preventDefault()
			$('#second_step').removeClass('d-none')
			$('#first_step').addClass('d-none')
			$('#first_prev').removeAttr('disabled')

			$('#respondent_label').addClass('d-none')
			$('#complainant_label').removeClass('d-none')
			$('#other_details_label').addClass('d-none')
			var resp_id = $('#resp_id').val()
			console.log(resp_id)
			if (resp_id != 0) {
				$('#res_comp_id option').prop('disabled', false);
				$('#res_comp_id option[value=' + resp_id + ']').prop('disabled', true);
			} else {
				$('#res_comp_id option').prop('disabled', false);
			}
		})
		$('#first_prev').on('click', function(e) {
			e.preventDefault()
			$('#second_step').addClass('d-none')
			$('#first_step').removeClass('d-none')

			$('#respondent_label').removeClass('d-none')
			$('#complainant_label').addClass('d-none')
			$('#other_details_label').addClass('d-none')

			var res_comp_id = $('#res_comp_id').val()
			console.log(res_comp_id)
			if (res_comp_id != 0) {
				$('#resp_id option').prop('disabled', false);
				$('#resp_id option[value=' + res_comp_id + ']').prop('disabled', true);
			} else {
				$('#resp_id option').prop('disabled', false);
			}
		})
		$('#second_next').on('click', function(e) {
			e.preventDefault()
			$('#third_step').removeClass('d-none')
			$('#second_step').addClass('d-none')
			$('#second_prev').removeAttr('disabled')

			$('#respondent_label').addClass('d-none')
			$('#complainant_label').addClass('d-none')
			$('#other_details_label').removeClass('d-none')
		})
		$('#second_prev').on('click', function(e) {
			e.preventDefault()
			$('#third_step').addClass('d-none')
			$('#second_step').removeClass('d-none')

			$('#respondent_label').addClass('d-none')
			$('#complainant_label').removeClass('d-none')
			$('#other_details_label').addClass('d-none')
		})

		$('#resp_id').on('change', function() {
			var resp_id = $(this).val()

			$('#first_next').removeAttr('disabled')


		})

		$('.bs-stepper-content').find('#complainant-part input, #complainant-part select').on('change', function() {
			var isStepValid = true;
			$('.bs-stepper-content').find('#complainant-part input[required], #complainant-part select[required]').each(function() {
				if ($(this).is('select')) { // if input is a select
					if (!$(this).val()) { // if select tag has no selected value
						isStepValid = false;
						return false; // break out of each loop early
					}
				} else if ($(this).val() === '') { // if input is empty
					isStepValid = false;
				}
			});

			if (isStepValid) {
				$('#second_next').removeAttr('disabled')
			} else {
				$('#second_next').attr('disabled', '')
			}
		})

		$('.bs-stepper-content').find('#other-part select, #other-part textarea').on('change', function() {
			var isStepValid = true;
			$('.bs-stepper-content').find('#other-part select[required], #other-part textarea[required]').each(function() {
				if ($(this).is('select')) { // if input is a select tag
					if (!$(this).val()) { // if select tag has no selected value
						isStepValid = false;
						return false; // break out of each loop early
					}
				} else if ($(this).val() === '') { // if input is empty
					isStepValid = false;
				}
			});

			if (isStepValid) {
				$('#submit').removeAttr('disabled')
			} else {
				$('#submit').attr('disabled', '')
			}
		})

		$('#fc_type').on('change', function() {
			var fc_type = $(this).val()
			var isStepValid = true;

			if (fc_type == 0) {
				$('#select-res-complainant').removeClass('d-none')
				$('#select-nres-complainant').addClass('d-none')
				$('#res_comp_id').removeAttr('disabled')
				$('#res_comp_id').attr('required', '')
				$('#nres_comp_id').attr('disabled', '')
				$('#nres_comp_id').removeAttr('required')

				$('.bs-stepper-content').find('#select-res-complainant input[required], #select-res-complainant select[required]').each(function() {
					if ($('#select-res-complainant input, #select-res-complainant select').is('select')) { // if input is a select
						if (!$('#select-res-complainant input, #select-res-complainant select').val()) { // if select tag has no selected value
							isStepValid = false;
							return false; // break out of each loop early
						}
					} else if ($('#select-res-complainant input, #select-res-complainant select').val() === '') { // if input is empty
						isStepValid = false;
					}
				})
			} else if (fc_type == 1) {
				$('#select-res-complainant').addClass('d-none')
				$('#select-nres-complainant').removeClass('d-none')
				$('#res_comp_id').attr('disabled', '')
				$('#res_comp_id').removeAttr('required')
				$('#nres_comp_id').removeAttr('disabled')
				$('#nres_comp_id').attr('required', '')

				$('.bs-stepper-content').find('#select-nres-complainant input[required], #select-nres-complainant select[required]').each(function() {
					if ($('#select-nres-complainant input, #select-nres-complainant select').is('select')) { // if input is a select
						if (!$('#select-nres-complainant input, #select-nres-complainant select').val()) { // if select tag has no selected value
							isStepValid = false;
							return false; // break out of each loop early
						}
					} else if ($('#select-nres-complainant input, #select-nres-complainant select').val() === '') { // if input is empty
						isStepValid = false;
					}
				})
			}
			if (isStepValid) {
				$('#second_next').removeAttr('disabled')
			} else {
				$('#second_next').attr('disabled', '')
			}
		})

		$('#insertFileComplaint').on('submit', function(e) {
			e.preventDefault();
			var insertFileComplaint = $('#insertFileComplaint').serialize();
			console.log(insertFileComplaint)
			swal.fire({
				title: "Continue filing this complaint?",
				icon: 'warning',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#dc3545',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-complaint-query.php",
						data: insertFileComplaint,
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
		$('.add-resident-respondent, .add-resident-complainant').on('click', function(e) {
			e.preventDefault()
			$('#addResidentModal').modal('show')
			$('#fileComplaintModal').modal('hide')
		})
		$('.add-non-resident').on('click', function(e) {
			e.preventDefault()
			$('#addNonResidentModal').modal('show')
			$('#fileComplaintModal').modal('hide')
		})
		$('.add-complaint-type').on('click', function(e) {
			e.preventDefault()
			$('#addComplaintTypeModal').modal('show')
			$('#fileComplaintModal').modal('hide')
		})
		$('#insertResident').on('submit', function(e) {
			e.preventDefault();
			var insertResident = $('#insertResident').serialize();
			console.log(insertResident)
			swal.fire({
				title: "Continue adding new record of resident?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#4e73df',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-resident-query.php",
						data: insertResident,
						success: function(data) {
							var response = JSON.parse(data);
							if (response.success_flag == 0) {
								toastr.error(response.message)
							} else {
								toastr.success(response.message);
								if ($('#resp_id').val() == '') {
									var selectElement = $('.resp_id');
									var newOption = new Option(response.res_lname + ', ' + response.res_fname, response.res_id, true, true);
									selectElement.append(newOption).trigger('change');

									var secondElement = $('.res_comp_id')
									var secondOption = new Option(response.res_lname + ', ' + response.res_fname, response.res_id)
									secondElement.append(secondOption).trigger('change');
								}

								if ($('#res_comp_id').val() == '') {
									var selectElement = $('.res_comp_id');
									var newOption = new Option(response.res_lname + ', ' + response.res_fname, response.res_id, true, true);
									selectElement.append(newOption).trigger('change');

									var secondElement = $('.resp_id')
									var secondOption = new Option(response.res_lname + ', ' + response.res_fname, response.res_id)
									secondElement.append(secondOption).trigger('change');
								}

								setTimeout(function() {
									$('#fileComplaintModal').modal('show')
									$('#addResidentModal').modal('hide')

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

		$('#insertNonResident').on('submit', function(e) {
			e.preventDefault();
			var insertNonResident = $('#insertNonResident').serialize();
			console.log(insertNonResident)
			swal.fire({
				title: "Continue adding new record of non-resident?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#4e73df',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-non-resident-query.php",
						data: insertNonResident,
						success: function(data) {
							var response = JSON.parse(data);
							console.log(response);
							if (response.success_flag == 0) {
								toastr.error(response.message)
							} else {
								toastr.success(response.message);
								var selectElement = $('.nres_comp_id');
								var newOption = new Option(response.nres_lname + ', ' + response.nres_fname, response.nres_id, true, true);
								selectElement.append(newOption).trigger('change');

								setTimeout(function() {
									$('#fileComplaintModal').modal('show')
									$('#addNonResidentModal').modal('hide')
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

		$('#insertComType').on('submit', function(e) {
			e.preventDefault();
			var insertComType = $('#insertComType').serialize();
			console.log(insertComType)
			swal.fire({
				title: "Continue adding new record of complaint type?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#4e73df',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-complaint-type-query.php",
						data: insertComType,
						success: function(data) {
							var response = JSON.parse(data);
							console.log(response);
							if (response.success_flag == 0) {
								toastr.error(response.message)
							} else {
								toastr.success(response.message);

								var selectElement = $('.com_id');
								var newOption = new Option(response.com_name, response.com_id, true, true);
								selectElement.append(newOption).trigger('change');

								setTimeout(function() {
									$('#fileComplaintModal').modal('show')
									$('#addComplaintTypeModal').modal('hide')
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
		$('#addResidentModal, #addNonResidentModal, #addComplaintTypeModal').on('hide.bs.modal', function() {
			$('#fileComplaintModal').modal('show')
		})
		// $('#addNonResidentModal').on('hide.bs.modal', function() {
		// 	$('#fileComplaintModal').modal('show')
		// })
		// $('#addComplaintTypeModal').on('hide.bs.modal', function() {
		// 	$('#fileComplaintModal'),modal('show')
		// })
	})
	document.addEventListener('DOMContentLoaded', function() {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	})
</script>

<?php
include 'assets/modals/add-residents-modal.php';
include 'assets/modals/add-non-resident-modal.php';
include 'assets/modals/add-complaint-type-modal.php';
include 'assets/modals/add-complaint-modal.php';
include 'layouts/footer.php';
?>