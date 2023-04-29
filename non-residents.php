<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$non_residents = $connection->query("SELECT * FROM tbl_non_residents");

$citizenship = $connection->query("SELECT * FROM tbl_citizenship");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">NON-RESIDENTS</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addNonResidentModal">
				<span class="icon text-white-50">
					<i class="bi bi-person-plus-fill"></i>
				</span>
				<span class="text">Add</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF NON-RESIDENTS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
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

<?php
include 'assets/modals/add-non-resident-modal.php';
include 'layouts/footer.php';
?>