<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$ct = $connection->query("SELECT * FROM tbl_complaint_type");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">COMPLAINT TYPE</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addComplaintTypeModal">
				<span class="icon text-white-50">
					<i class="fas fa-database"></i>
				</span>
				<span class="text">Add Complaint Type</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">TYPES OF COMPLAINTS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 35%">Name</th>
								<th style="width: 30%">Description</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Date Added">Date</th>
								<th class="text-center" style="width: 15%" data-toggle="tooltip" title="Time Added">Time</th>
								<th style="width: 5%">Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
							if ($ct->num_rows > 0) {
								while ($row = $ct->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['com_name'] ?></td>
										<td><?php if(strlen($row['com_details']) > 70): echo substr($row['com_details'], 0, 70) . '...'; else: echo $row['com_details']; endif; ?></td>
										<td class="text-center"><?= date('M. j, Y', strtotime($row['com_regdatetime'])) ?></td>
										<td class="text-center"><?= date('h:m A', strtotime($row['com_regdatetime'])) ?></td>
										<td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editComplaintTypeModal<?= $row['com_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
									</tr>
									<?php
									include 'assets/modals/edit-complaint-type-modal.php';
									// include 'assets/modals/view-profile-modal.php';
								}
							}
							?>
            			</tbody>
            			<tfoot class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 35%">Name</th>
								<th style="width: 30%">Description</th>
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
<script>
	$(document).ready(function() {
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
include 'assets/modals/add-complaint-type-modal.php';
include 'layouts/footer.php';
?>