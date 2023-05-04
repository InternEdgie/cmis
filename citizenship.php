<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$citizenship = $connection->query("SELECT * FROM tbl_citizenship");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">CITIZENSHIP</h1>
			<a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addCitizenshipModal">
				<span class="icon text-white-50 d-none d-sm-inline-block">
					<i class="fas fa-database"></i>
				</span>
				<span class="text">Add Citizenship</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF CITIZENSHIP</h6>
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
							if ($citizenship->num_rows > 0) {
								while ($row = $citizenship->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['citizenship_name'] ?></td>
										<td><?php if(strlen($row['citizenship_description']) >= 55): echo substr($row['citizenship_description'], 0, 55) . '...'; else: echo $row['citizenship_description']; endif; ?></td>
										<td><?= date('M. j, Y', strtotime($row['citizenship_regdatetime'])) ?></td>
										<td data-id="<?= $row['citizenship_id'] ?>"><?= date('h:m A', strtotime($row['citizenship_regdatetime'])) ?></td>
										<td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editCitizenshipModal<?= $row['citizenship_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
									</tr>
									<?php
									include 'assets/modals/edit-citizenship-modal.php';
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
<script>
	$(document).ready(function() {
		$('#insertCitizenship').on('submit', function(e) {
			e.preventDefault();
			var insertCitizenship = $('#insertCitizenship').serialize();
			console.log(insertCitizenship)
			swal.fire({
				title: "Continue adding new record of citizenship?",
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
						url: "config/queries/add-citizenship-query.php",
						data: insertCitizenship,
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
include 'assets/modals/add-citizenship-modal.php';
include 'layouts/footer.php';
?>