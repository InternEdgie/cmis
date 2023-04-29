<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$positions = $connection->query("SELECT * FROM tbl_positions");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">POSITIONS</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addPositionModal">
				<span class="icon text-white-50">
					<i class="fas fa-database"></i>
				</span>
				<span class="text">Add Position</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF POSITIONS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 15%">Name</th>
								<th style="width: 50%">Description</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Date Added">Date</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Time Added">Time</th>
								<th style="width: 5%">Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
							if ($positions->num_rows > 0) {
								while ($row = $positions->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['pos_name'] ?></td>
										<td><?php if(strlen($row['pos_description']) >= 55): echo substr($row['pos_description'], 0, 55) . '...'; else: echo $row['pos_description']; endif; ?></td>
										<td class="text-center"><?= date('M. j, Y', strtotime($row['pos_regdatetime'])) ?></td>
										<td class="text-center"><?= date('h:m A', strtotime($row['pos_regdatetime'])) ?></td>
										<td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editPositionModal<?= $row['pos_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
									</tr>
									<?php
									include 'assets/modals/edit-position-modal.php';
									// include 'assets/modals/view-profile-modal.php';
								}
							}
							?>
            			</tbody>
            			<tfoot class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 15%">Name</th>
								<th style="width: 50%">Description</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Date Added">Date</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Time Added">Time</th>
								<th style="width: 5%">Action</th>
            				</tr>
            			</tfoot>
            		</table>
            	</div>
            </div>
		</div>
	</div>
</div>

<?php
include 'assets/modals/add-position-modal.php';
include 'layouts/footer.php';
?>