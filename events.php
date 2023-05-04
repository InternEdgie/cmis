<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$events = $connection->query("SELECT * FROM tbl_events");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">EVENTS</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addEventModal">
				<span class="icon text-white-50">
					<i class="fas fa-database"></i>
				</span>
				<span class="text">Add Events</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF EVENTS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 50%">Name</th>
								<th style="width: 5%">Color</th>
								<th class="text-center" style="width:15%">Date</th>
								<th class="text-center" style="width:15%">Time</th>
								<th class="text-center" style="width:5%">Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
							if ($events->num_rows > 0) {
								while ($row = $events->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['event_name'] ?></td>
										<td><i class="bi bi-square-fill" style="color:<?= $row['event_color'] ?>" data-toggle="tooltip" title="<?= $row['event_color'] ?>"></i></td>
										<td class="text-center"><?= date('M. j, Y', strtotime($row['event_regdatetime'])) ?></td>
										<td class="text-center"><?= date('h:m A', strtotime($row['event_regdatetime'])) ?></td>
										<td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editEventModal<?= $row['event_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
									</tr>
									<?php
									include 'assets/modals/edit-event-modal.php';
									// include 'assets/modals/view-profile-modal.php';
								}
							}
							?>
            			</tbody>
            			<tfoot class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 50%">Name</th>
								<th style="width: 5%">Color</th>
								<th class="text-center" style="width:15%">Date</th>
								<th class="text-center" style="width:15%">Time</th>
								<th class="text-center" style="width:5%">Action</th>
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
		$('#insertEvent').on('submit', function(e) {
			e.preventDefault();
			var insertEvent = $('#insertEvent').serialize();
			console.log(insertEvent)
			swal.fire({
				title: "Continue adding new record of event?",
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
						url: "config/queries/add-event-query.php",
						data: insertEvent,
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
include 'assets/modals/add-event-modal.php';
include 'layouts/footer.php';
?>

