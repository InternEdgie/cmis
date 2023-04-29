<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$id = $_GET['id'];

$row = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '$id'")->fetch_assoc();

$citizenship_id = $row['citizenship_id'];

$cdata = $connection->query("SELECT * FROM tbl_citizenship WHERE citizenship_id = '$citizenship_id'")->fetch_assoc();

// $respondent = $connection->query("SELECT * FROM tbl_file_complaint WHERE resp_id = '$id'");

$complainant = $connection->query("SELECT * FROM tbl_file_complaint WHERE comp_id = '$id' AND fc_type = 1");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center mb-4">
			<div class="breadcrumb-item"><a href="non-residents.php">List of Non-Residents</a></div>
			<div class="breadcrumb-item active">Profile Viewing</div>
			<button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print">
				<span class="icon">
					<i class="bi bi-printer"></i>
				</span>
				<span class="text">Print</span>
			</button>
			<a href="#" class="ml-3 btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm" data-toggle="modal" data-target="#editNonResidentModal">
				<span class="icon">
					<i class="bi bi-pencil-square"></i>
				</span>
				<span class="text">Edit</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div id="printThis">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold card-title">NON-RESIDENT INFORMATION</h6>
				</div>
				<div class="card-body">
					<dl>
						<div class="row mb-3">
							<div class="col-sm-4">
								<dt>NAME</dt>
								<dd id="fullname" ><?= $row['nres_fname'] . ' ' . $row['nres_mname'] . ' ' . $row['nres_lname'] . ' ' . $row['nres_suffix']; ?></dd>
							</div>
							<div class="col-sm-4">
								<dt>GENDER</dt>
								<dd id="gender" ><?= $row['nres_gender'] ?></dd>
							</div>
							<div class="col-sm-4">
								<dt>CIVIL STATUS</dt>
								<dd id="civil" ><?= $row['nres_cstatus'] ?></dd>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-4">
								<dt>BIRTHDAY</dt>
								<dd id="birthday" ><?= date('M. d, Y', strtotime($row['nres_birthday'] )) ?></dd>
							</div>
							<div class="col-sm-4">
								<dt>AGE</dt>
								<dd id="age" ><?= $row['nres_age'] ?></dd>
							</div>
							<div class="col-sm-4">
								<dt>CITIZENSHIP</dt>
								<dd id="citizenship"><?= $cdata['citizenship_name'] ?></dd>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<dt>CONTACT NUMBER</dt>
								<dd id="contact" ><?= $row['nres_contact'] ?></dd>
							</div>
							<div class="col-sm-8">
								<dt>ADDRESS</dt>
								<dd id="address">
									<?php 

									echo $row['nres_zone'] . ', ' . $row['nres_barangay'] . ', ' . $row['nres_city']  . ', ' . $row['nres_province'] . ' ' . $row['nres_zcode']; 
									?>
								</dd>
							</div>
						</div>
					</dl>
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold card-title">COMPLAINT FILED HISTORY</h6>
				</div>
				<div class="card-body">
					<?php if ($complainant->num_rows > 0): ?>
						<div class="table-responsive">
							<table class="table table-striped text-gray-900 border" width="100%">
								<tr>
									<th>Entry No.</th>
									<th>Respondent</th>
									<th>Case Filed</th>
									<th>Status</th>
									<th>Date Filed</th>
								</tr>
								<?php
								while ($rowc = $complainant->fetch_assoc()) {
									$resp_id = $rowc['resp_id'];
		                            $resp1 = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$resp_id'")->fetch_assoc();
		                            $rp_fullname = $resp1['res_fname'] . ' ' . $resp1['res_mname'] . ' ' . $resp1['res_lname'];
									?>
									<tr>
										<td><?= $rowc['fc_id'] ?></td>
										<td><?= $rp_fullname ?></td>
										<td>
											<?php
											$com_id = $rowc['com_id'];
											$complaint = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$com_id'")->fetch_assoc();
											echo $complaint['com_name'];
											?>
										</td>
										<td>
											<?php
											$status_id = $rowc['status_id'];
											$status = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$status_id'")->fetch_assoc();
											if (!empty($status['status_name'])) {
												echo $status['status_name'];
											} else {
												echo "---";
											}
											?>
										</td>
										<td><?= date('F d, Y', strtotime($rowc['fc_regdatetime'])) ?></td>
									</tr>
									<?php
								}
								?>
							</table>
						</div>
					<?php else: ?>
						<h6 class="text-center font-italic text-gray-500">No data available</h6>
					<?php endif; ?>
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
				<td style="width:80%"><h6 class="mb-0 h6 text-center">Republic of the Philippines</h6></td>
				<td rowspan="6" style="width:10%"></td>
			</tr>
			<tr>
				<td><h6 class="mb-0 text-center">Province of Misamis Oriental</h6></td>

			</tr>
			<tr>
				<td><h6 class="mb-0 text-center">City of Cagayan de Oro</h6></td>

			</tr>
			<tr>
				<td><h6 class="mb-0 h6 font-weight-bold text-center">OFFICE OF LUPONG TAGAPAMAYAPA</h6></td>

			</tr>
			<tr>
				<td><h5 class="fw-bold mb-0 font-weight-bold text-center">BARANGAY MACABALAN</h5></td>

			</tr>
			<tr>
				<td class="text-center font-italic"><h7>Tel No. 881-2209</h7></td>
			</tr>
		</table>
	</div>
</noscript>
<script>
	$(document).ready(function () {
		$('#print').click(function(){
			// start_loader();
			var _h = $('head').clone()
			var _p = $('#printThis').clone()
            var _ph = $($('noscript#print-header').html()).clone()
            var _el = $('<div>')
            _p.find('.card').removeClass('shadow card')
            _p.find('.card-header').removeClass('card-header')
            _p.find('.card-body').removeClass('card-body')
            _p.find('h6.card-title').addClass('text-center h5')
            _el.append(_h)
            _el.append(_ph)
            _el.find('title').text('Non-Resident Profile')
            _el.append(_p)

            var nw = window.open('','_blank','width=1000,height=900,top=50,left=200')
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
	// toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
</script>
<?php
include 'assets/modals/edit-non-residents-modal.php';
include 'layouts/footer.php';
?>