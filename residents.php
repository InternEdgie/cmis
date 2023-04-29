<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$residents = $connection->query("SELECT * FROM tbl_residents");

$zone_list = $connection->query("SELECT * FROM tbl_zone");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">RESIDENTS</h1>
			<!-- <a href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" data-toggle="modal" data-target="#chooseComplainant">
				<span class="icon text-white-50">
					<i class="bi bi-download"></i>
				</span>
				<span class="text">Export</span>
			</a>
			<a href="#" class="ml-3 btn btn-sm btn-secondary btn-icon-split shadow-sm" data-toggle="modal" data-target="#importResidentsModal">
				<span class="icon text-white-50">
					<i class="bi bi-upload"></i>
				</span>
				<span class="text">Import</span>
			</a> -->
			<a href="#" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addResidentModal">
				<span class="icon text-white-50">
					<i class="bi bi-person-plus-fill"></i>
				</span>
				<span class="text">Add</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF RESIDENTS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
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
										<td><?= $row['res_age'] ?></td>
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

<?php
include 'assets/modals/add-residents-modal.php';
// include 'assets/modals/import-residents-modal.php';
include 'layouts/footer.php';
?>