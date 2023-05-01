<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$lupon = $connection->query("SELECT * FROM tbl_lupon l, tbl_residents r, tbl_positions p WHERE l.res_id = r.res_id AND l.pos_id = p.pos_id");


?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">LUPONG TAGAPAMAYAPA</h1>
			<a href="#" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addLuponModal">
				<span class="icon text-white-50">
					<i class="bi bi-person-plus-fill"></i>
				</span>
				<span class="text">Add</span>
			</a>
		</div>
		<?php include 'config/message.php'; ?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF LUPON OFFICIALS/MEMBERS</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_asc" width="100%">
            			<thead class="bg-gray-900 text-white">
            				<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Contact Number</th>
								<th>Status</th>
								<th class="text-center">Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
							if ($lupon->num_rows > 0) {
								while ($row = $lupon->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_suffix'] ?></td>
										<td><?= $row['pos_name'] ?></td>
										<td><?= $row['res_contact'] ?></td>
										<td>
											<?php
											if ($row['status'] == 1) {
												echo "Active";
											} else {
												echo "Inactive";
											}
											?>
										</td>
										<td class="text-center"><a href="view-lupon-profile.php?id=<?= $row['res_id'] ?>" class="d-none d-sm-inline-block btn btn-info btn-sm shadow-sm" data-toggle="tooltip" title="View Profile"><i class="bi bi-info-circle"></i></a></td>
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
<script>
	$(document).ready(function() {
		$('#insertLupon').on('submit', function(e) {
			e.preventDefault();
			var insertLupon = $('#insertLupon').serialize();
			console.log(insertLupon)
			swal.fire({
				title: "Continue adding new record of lupon?",
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
						url: "config/queries/add-lupon-query.php",
						data: insertLupon,
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
include 'assets/modals/add-lupon-modal.php';
include 'layouts/footer.php';
?>