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

	for ($i=1; ;$i++) {
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
					<table class="table table-striped table-hover" id="table_desc" width="100%">
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
			$('#second_step').removeClass('d-none')
			$('#first_step').addClass('d-none')
			$('#first_prev').removeAttr('disabled')
		})
		$('#first_prev').on('click', function(e) {
			e.preventDefault()
			$('#second_step').addClass('d-none')
			$('#first_step').removeClass('d-none')
		})
		$('#second_next').on('click', function(e) {
			e.preventDefault()
			$('#third_step').removeClass('d-none')
			$('#second_step').addClass('d-none')
			$('#second_prev').removeAttr('disabled')

		})
		$('#second_prev').on('click', function(e) {
			e.preventDefault()
			$('#third_step').addClass('d-none')
			$('#second_step').removeClass('d-none')
		})

		$('#resp_id').on('change', function() {
			var resp_id = $(this).val()
			if (resp_id == 0) {
				$('#add-resident-respondent').removeClass('d-none')
				$('#res_fname').attr('required', '')
				$('#res_lname').attr('required', '')
				$('#res_birthday').attr('required', '')
				$('#res_gender').attr('required', '')
				$('#res_cstatus').attr('required', '')
				$('#zone_id').attr('required', '')
				$('#res_contact').attr('required', '')

				$('#first_next').attr('disabled', '')

				$('#res_fname').removeAttr('disabled')
				$('#res_mname').removeAttr('disabled')
				$('#res_lname').removeAttr('disabled')
				$('#res_suffix').removeAttr('disabled')
				$('#res_birthday').removeAttr('disabled')
				$('#res_gender').removeAttr('disabled')
				$('#res_cstatus').removeAttr('disabled')
				$('#zone_id').removeAttr('disabled')
				$('#res_contact').removeAttr('disabled')
			} else {
				$('#add-resident-respondent').addClass('d-none')
				$('#res_fname').removeAttr('required')
				$('#res_lname').removeAttr('required')
				$('#res_birthday').removeAttr('required')
				$('#res_gender').removeAttr('required')
				$('#res_cstatus').removeAttr('required')
				$('#zone_id').removeAttr('required')
				$('#res_contact').removeAttr('required')

				$('#first_next').removeAttr('disabled')

				$('#res_fname').attr('disabled', '')
				$('#res_mname').attr('disabled', '')
				$('#res_lname').attr('disabled', '')
				$('#res_suffix').attr('disabled', '')
				$('#res_birthday').attr('disabled', '')
				$('#res_gender').attr('disabled', '')
				$('#res_cstatus').attr('disabled', '')
				$('#zone_id').attr('disabled', '')
				$('#res_contact').attr('disabled', '')

				

				// if (val != '') {
				// 	none.style.visibility = "visible";
				// 	document.getElementById('com').removeAttribute('disabled');
				// 	document.getElementById('comp1').removeAttribute('disabled');
				// 	document.getElementById('submit').removeAttribute('disabled');
				// 	$('#res_comp_id').removeAttribute('disabled')
				// }
			}

			if ($('#res_fname').val() != '' && $('#res_lname').val() != '' && $('#res_birthday').val() != '' && $('#res_gender').val() != '' && $('#res_cstatus').val() != '' && $('#zone_id').val() != '' && $('#res_contact').val() != '') {
				$('#first_next').removeAttr('disabled')
			}


		})
		$('.bs-stepper-content').find('#add-resident-respondent input, #add-resident-respondent select').on('change', function() {
			var isStepValid = true;
			$('.bs-stepper-content').find('#add-resident-respondent input[required], #add-resident-respondent select[required]').each(function() {
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
				$('#first_next').removeAttr('disabled')
			} else {
				$('#first_next').attr('disabled', '')
			}
		})

		$('.bs-stepper-content').find('#add-resident-complainant input, #add-resident-complainant select').on('change', function() {
			var isStepValid = true;
			$('.bs-stepper-content').find('#add-resident-complainant input[required], #add-resident-complainant select[required]').each(function() {
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
				$('#second_next').removeAttr('disabled')
			} else {
				$('#second_next').attr('disabled', '')
			}
		})

		$('.bs-stepper-content').find('#complainant-part input, #complainant-part select').on('change', function() {
			var isStepValid = true;
			$('.bs-stepper-content').find('#complainant-part input[required], #complainant-part select[required]').each(function() {
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

			if ($('#res_comp_id').val() === null || $('#nres_comp_id').val() === null) {
				$('#second_next').attr('disabled', '')
			} else {
				$('#second_next').removeAttr('disabled')
			}

			if (fc_type == 0) {
				$('#select-res-complainant').removeClass('d-none')
				$('#select-nres-complainant').addClass('d-none')
				$('#res_comp_id').removeAttr('disabled')
				$('#nres_comp_id').attr('disabled', '')

				$('#nres_fname').attr('disabled', '')
				$('#nres_mname').attr('disabled', '')
				$('#nres_lname').attr('disabled', '')
				$('#nres_suffix').attr('disabled', '')
				$('#nres_birthday').attr('disabled', '')
				$('#nres_gender').attr('disabled', '')
				$('#nres_cstatus').attr('disabled', '')
				$('#nres_citizenship_id').attr('disabled', '')
				$('#nres_zone').attr('disabled', '')
				$('#nres_barangay').attr('disabled', '')
				$('#nres_city').attr('disabled', '')
				$('#nres_province').attr('disabled', '')
				$('#nres_zcode').attr('disabled', '')
				$('#nres_contact').attr('disabled', '')

			} else {
				$('#select-res-complainant').addClass('d-none')
				$('#select-nres-complainant').removeClass('d-none')
				$('#res_comp_id').attr('disabled', '')
				$('#nres_comp_id').removeAttr('disabled')

				$('#comp_res_fname').attr('disabled', '')
				$('#comp_res_mname').attr('disabled', '')
				$('#comp_res_lname').attr('disabled', '')
				$('#comp_res_suffix').attr('disabled', '')
				$('#comp_res_birthday').attr('disabled', '')
				$('#comp_res_gender').attr('disabled', '')
				$('#comp_res_cstatus').attr('disabled', '')
				$('#comp_zone_id').attr('disabled', '')
				$('#comp_res_contact').attr('disabled', '')
			}

			// if ($('#res_comp_id').val() == 0 && $('#comp_res_fname').val() != '' && $('#comp_res_lname').val() != '' && $('#comp_res_birthday').val() && $('#comp_res_gender').val() != '' && $('#comp_res_cstatus').val() != '' && $('#comp_zone_id').val() != '' && $('#comp_res_contact').val() != '') {
			// 	$('#comp_res_fname').removeAttr('disabled')
			// 	$('#comp_res_mname').removeAttr('disabled')
			// 	$('#comp_res_lname').removeAttr('disabled')
			// 	$('#comp_res_suffix').removeAttr('disabled')
			// 	$('#comp_res_birthday').removeAttr('disabled')
			// 	$('#comp_res_gender').removeAttr('disabled')
			// 	$('#comp_res_cstatus').removeAttr('disabled')
			// 	$('#comp_zone_id').removeAttr('disabled')
			// 	$('#comp_res_contact').removeAttr('disabled')

			// 	$('#second_next').removeAttr('disabled')
			// } else {
			// 	$('#comp_res_fname').removeAttr('disabled')
			// 	$('#comp_res_mname').removeAttr('disabled')
			// 	$('#comp_res_lname').removeAttr('disabled')
			// 	$('#comp_res_suffix').removeAttr('disabled')
			// 	$('#comp_res_birthday').removeAttr('disabled')
			// 	$('#comp_res_gender').removeAttr('disabled')
			// 	$('#comp_res_cstatus').removeAttr('disabled')
			// 	$('#comp_zone_id').removeAttr('disabled')
			// 	$('#comp_res_contact').removeAttr('disabled')

			// 	$('#second_next').attr('disabled')
			// }

			// if ($('#nres_comp_id').val() == 0) {
			// 	$('#nres_fname').removeAttr('disabled')
			// 	$('#nres_mname').removeAttr('disabled')
			// 	$('#nres_lname').removeAttr('disabled')
			// 	$('#nres_suffix').removeAttr('disabled')
			// 	$('#nres_birthday').removeAttr('disabled')
			// 	$('#nres_gender').removeAttr('disabled')
			// 	$('#nres_cstatus').removeAttr('disabled')
			// 	$('#nres_citizenship_id').removeAttr('disabled')
			// 	$('#nres_zone').removeAttr('disabled')
			// 	$('#nres_barangay').removeAttr('disabled')
			// 	$('#nres_city').removeAttr('disabled')
			// 	$('#nres_province').removeAttr('disabled')
			// 	$('#nres_zcode').removeAttr('disabled')
			// 	$('#nres_contact').removeAttr('disabled')
			// }
		})

		$('#res_comp_id').on('change', function() {
			var res_comp = $(this).val()

			if (res_comp == 0) {
				$('#add-resident-complainant').removeClass('d-none')

				$('#comp_res_fname').attr('required', '')
				$('#comp_res_lname').attr('required', '')
				$('#comp_res_birthday').attr('required', '')
				$('#comp_res_gender').attr('required', '')
				$('#comp_res_cstatus').attr('required', '')
				$('#comp_zone_id').attr('required', '')
				$('#comp_res_contact').attr('required', '')

				$('#second_next').attr('disabled', '')

				$('#comp_res_fname').removeAttr('disabled')
				$('#comp_res_mname').removeAttr('disabled')
				$('#comp_res_lname').removeAttr('disabled')
				$('#comp_res_suffix').removeAttr('disabled')
				$('#comp_res_birthday').removeAttr('disabled')
				$('#comp_res_gender').removeAttr('disabled')
				$('#comp_res_cstatus').removeAttr('disabled')
				$('#comp_zone_id').removeAttr('disabled')
				$('#comp_res_contact').removeAttr('disabled')
			} else {
				$('#add-resident-complainant').addClass('d-none')

				$('#comp_res_fname').removeAttr('required')
				$('#comp_res_lname').removeAttr('required')
				$('#comp_res_birthday').removeAttr('required')
				$('#comp_res_gender').removeAttr('required')
				$('#comp_res_cstatus').removeAttr('required')
				$('#comp_zone_id').removeAttr('required')
				$('#comp_res_contact').removeAttr('required')

				$('#second_next').removeAttr('disabled')

				$('#comp_res_fname').attr('disabled', '')
				$('#comp_res_mname').attr('disabled', '')
				$('#comp_res_lname').attr('disabled', '')
				$('#comp_res_suffix').attr('disabled', '')
				$('#comp_res_birthday').attr('disabled', '')
				$('#comp_res_gender').attr('disabled', '')
				$('#comp_res_cstatus').attr('disabled', '')
				$('#comp_zone_id').attr('disabled', '')
				$('#comp_res_contact').attr('disabled', '')
			}
		})

		$('#nres_comp_id').on('change', function() {
			var nres_comp = $(this).val()

			if (nres_comp == 0) {
				$('#add-non-resident-complainant').removeClass('d-none')

				$('#nres_fname').attr('required', '')
				$('#nres_lname').attr('required', '')
				$('#nres_birthday').attr('required', '')
				$('#nres_gender').attr('required', '')
				$('#nres_cstatus').attr('required', '')
				$('#nres_citizenship_id').attr('required', '')
				$('#nres_zone').attr('required', '')
				$('#nres_barangay').attr('required', '')
				$('#nres_city').attr('required', '')
				$('#nres_province').attr('required', '')
				$('#nres_zcode').attr('required', '')
				$('#nres_contact').attr('required', '')

				$('#second_next').attr('disabled', '')

				$('#nres_fname').removeAttr('disabled')
				$('#nres_mname').removeAttr('disabled')
				$('#nres_lname').removeAttr('disabled')
				$('#nres_suffix').removeAttr('disabled')
				$('#nres_birthday').removeAttr('disabled')
				$('#nres_gender').removeAttr('disabled')
				$('#nres_cstatus').removeAttr('disabled')
				$('#nres_citizenship_id').removeAttr('disabled')
				$('#nres_zone').removeAttr('disabled')
				$('#nres_barangay').removeAttr('disabled')
				$('#nres_city').removeAttr('disabled')
				$('#nres_province').removeAttr('disabled')
				$('#nres_zcode').removeAttr('disabled')
				$('#nres_contact').removeAttr('disabled')
			} else {
				$('#add-non-resident-complainant').addClass('d-none')

				$('#nres_fname').removeAttr('required',)
				$('#nres_lname').removeAttr('required',)
				$('#nres_birthday').removeAttr('required')
				$('#nres_gender').removeAttr('required')
				$('#nres_cstatus').removeAttr('required')
				$('#nres_citizenship_id').removeAttr('required')
				$('#nres_zone').removeAttr('required')
				$('#nres_barangay').removeAttr('required')
				$('#nres_city').removeAttr('required')
				$('#nres_province').removeAttr('required')
				$('#nres_zcode').removeAttr('required')
				$('#nres_contact').removeAttr('required')

				$('#second_next').removeAttr('disabled')

				$('#nres_fname').attr('disabled', '')
				$('#nres_mname').attr('disabled', '')
				$('#nres_lname').attr('disabled', '')
				$('#nres_suffix').attr('disabled', '')
				$('#nres_birthday').attr('disabled', '')
				$('#nres_gender').attr('disabled', '')
				$('#nres_cstatus').attr('disabled', '')
				$('#nres_citizenship_id').attr('disabled', '')
				$('#nres_zone').attr('disabled', '')
				$('#nres_barangay').attr('disabled', '')
				$('#nres_city').attr('disabled', '')
				$('#nres_province').attr('disabled', '')
				$('#nres_zcode').attr('disabled', '')
				$('#nres_contact').attr('disabled', '')
			}
		})

		$('#insertFileComplaint').on('submit', function(e) {
			e.preventDefault();
			var insertFileComplaint = $('#insertFileComplaint').serialize();
			console.log(insertFileComplaint)
			// swal.fire({
			// 	title: "Continue filing this complaint?",
			// 	icon: 'question',
			// 	showCancelButton: !0,
			// 	confirmButtonText: "Yes, continue!",
			// 	confirmButtonColor: '#4e73df',
			// 	cancelButtonText: "No, wait go back!",
			// 	reverseButtons: !0
			// }).then(function(e) {
			// 	if (e.value === true) {
			// 		$.ajax({
			// 			type: 'POST',
			// 			url: "config/queries/add-complaint-query.php",
			// 			data: insertFileComplaint,
			// 			success: function(data) {
			// 				var response = JSON.parse(data);
			// 				console.log(response);
			// 				if (response.success_flag == 0) {
			// 					toastr.error(response.message)
			// 				} else {
			// 					toastr.success(response.message);

			// 					setTimeout(function() {
			// 						window.location.reload();
			// 					}, 2000);
			// 				}
			// 			}
			// 		});
			// 	} else {
			// 		e.dismiss;
			// 	}
			// }, function(dismiss) {
			// 	return false;
			// })
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