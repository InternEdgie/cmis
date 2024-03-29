<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$residents = $connection->query("SELECT * FROM tbl_residents");

$zone_list = $connection->query("SELECT * FROM tbl_zone");
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Residents</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 align-self-center text-right">
				<a href="#" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addResidentModal">
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
						<h6 class="m-0 font-weight-bold">LIST OF RESIDENTS</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="table_asc" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Zone</th>
										<th>Contact Number</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($residents->num_rows > 0) {
										while ($row = $residents->fetch_assoc()) {
									?>
											<tr>
												<td><?= $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_suffix'] ?></td>
												<td>
													<?php
													// $row['res_age']
													$formatbd = str_replace('/', '-', $row['res_birthday']);
													$newbd = date('d-m-Y', strtotime($formatbd));
													$dob = new DateTime($newbd); // Create a datetime object using date of birth
													$now = new DateTime(); // Get current date
													$diff = $now->diff($dob); // Calculate the time difference between the two dates
													echo $age = $diff->y; //Output: Current Age
													?>
												</td>
												<td><?= $row['res_gender'] ?></td>
												<td>
													<?php
													$zone = $row['zone_id'];
													$zone_name = "SELECT * FROM tbl_zone WHERE '$zone' = zone_id";
													$zone_name_result = $connection->query($zone_name);
													$zone_data = $zone_name_result->fetch_array();
													echo $zone_data['zone_name'];
													?>
												</td>
												<td><?= $row['res_contact'] ?></td>
												<td class="text-center">
													<a href="view-resident-profile.php?id=<?= $row['res_id'] ?>" class="d-none d-sm-inline-block btn btn-info btn-sm shadow-sm" data-toggle="tooltip" title="View Profile"><i class="bi bi-info-circle"></i></a>
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
include 'assets/modals/add-residents-modal.php';
// include 'assets/modals/import-residents-modal.php';
include 'layouts/footer.php';
?>