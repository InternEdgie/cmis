<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$id = $_GET['id'];

$row = $connection->query("SELECT * FROM tbl_lupon l, tbl_residents r, tbl_positions p WHERE l.res_id = r.res_id AND l.pos_id = p.pos_id AND l.res_id = '$id'")->fetch_assoc();

$zone_id = $row['zone_id'];

$zone_data = $connection->query("SELECT * FROM tbl_zone WHERE zone_id = '$zone_id'")->fetch_assoc();
?>

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="lupon.php">Lupong Tagapamayapa</a></li>
					<li class="breadcrumb-item active">Profile Viewing</li>
				</ol>
			</div><!-- /.col -->
			<div class="col-sm-6 align-self-center text-right">
				<button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print">
					<span class="icon">
						<i class="bi bi-printer"></i>
					</span>
					<span class="text">Print</span>
				</button>
				<a href="#" class="ml-3 btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm" data-toggle="modal" data-target="#editLuponModal">
					<span class="icon">
						<i class="bi bi-pencil-square"></i>
					</span>
					<span class="text">Edit</span>
				</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content pb-5" id="printThis">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold card-title">LUPON INFORMATION</h6>
					</div>
					<div class="card-body">
						<dl>
							<div class="row mb-3">
								<div class="col">
									<dt>NAME</dt>
									<dd id="fullname"><?= $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_lname'] . ' ' . $row['res_suffix']; ?></dd>
								</div>
								<div class="col">
									<dt>GENDER</dt>
									<dd id="gender"><?= $row['res_gender'] ?></dd>
								</div>
								<div class="col">
									<dt>CIVIL STATUS</dt>
									<dd id="civil"><?= $row['res_cstatus'] ?></dd>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col">
									<dt>BIRTHDAY</dt>
									<dd id="birthday"><?= date('M. d, Y', strtotime($row['res_birthday'])) ?></dd>
								</div>
								<div class="col">
									<dt>AGE</dt>
									<dd id="age"><?= $row['res_age'] ?></dd>
								</div>
								<div class="col">
									<dt>CONTACT NUMBER</dt>
									<dd id="contact"><?= $row['res_contact'] ?></dd>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<dt>POSITION</dt>
									<dd><?= $row['pos_name'] ?></dd>
								</div>
								<div class="col-sm-4">
									<dt>STATUS</dt>
									<dd><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></dd>
								</div>
								<div class="col-sm-4">
									<dt>ADDRESS</dt>
									<dd id="zone">
										<?php

										echo $zone_data['zone_name'] . ', Macabalan, Cagayan de Oro City, Misamis Oriental';
										?>
									</dd>
								</div>
							</div>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
			_p.find('h6.card-title').removeClass('card-title')
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
		$('#updateLupon').on('submit', function(e) {
			e.preventDefault();
			var updateLupon = $('#updateLupon').serialize();
			console.log(updateLupon)
			swal.fire({
				title: "Are you sure you want to update this record?",
				icon: 'warning',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#f6c23e',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/edit-lupon-query.php",
						data: updateLupon,
						success: function(data) {
							var response = JSON.parse(data);
							console.log(response);
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
	});
	// toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
</script>
<?php
include 'assets/modals/edit-lupon-modal.php';
// include 'assets/modals/import-residents-modal.php';
include 'layouts/footer.php';
?>