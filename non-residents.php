<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$non_residents = $connection->query("SELECT * FROM tbl_non_residents");

$citizenship = $connection->query("SELECT * FROM tbl_citizenship");
?>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Non-Residents</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 align-self-center text-right">
				<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addNonResidentModal">
					<span class="icon text-white-50">
						<i class="bi bi-person-plus-fill"></i>
					</span>
					<span class="text">Add</span>
				</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content pb-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold">LIST OF NON-RESIDENTS</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="table_asc" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Contact Number</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($non_residents->num_rows > 0) {
										while ($row = $non_residents->fetch_assoc()) {
									?>
											<tr>
												<td><?= $row['nres_lname'] . ', ' . $row['nres_fname'] . ' ' . $row['nres_mname'] . ' ' . $row['nres_suffix'] ?></td>
												<td><?= $row['nres_age'] ?></td>
												<td><?= $row['nres_gender'] ?></td>
												<td><?= str_replace('-', '', $row['nres_contact']) ?></td>
												<td class="text-center">
													<a href="view-non-resident-profile.php?id=<?= $row['nres_id'] ?>" class="d-none d-sm-inline-block btn btn-info btn-sm shadow-sm" data-toggle="tooltip" title="View Profile"><i class="bi bi-info-circle"></i></a>
												</td>
											</tr>
									<?php
										}
									}

									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
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
	})
</script>
<?php
include 'assets/modals/add-non-resident-modal.php';
include 'layouts/footer.php';
?>