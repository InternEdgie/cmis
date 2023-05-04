<div class="modal fade" id="editComplaintTypeModal<?= $row['com_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" id="updateComType<?= $row['com_id'] ?>">
				<input type="hidden" name="com_id" value="<?= $row['com_id'] ?>">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-warning"></i>Edit Complaint Type</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="complaint_type">Complaint Type Name:</label>
						<input type="text" class="form-control" placeholder="Enter complaint type..." id="complaint_type" value="<?= $row['com_name'] ?>" name="complaint_type" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" value="<?= $row['com_details'] ?>" name="description" required><?= $row['com_details'] ?></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-warning btn-sm text-gray-900" name="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {

		$('#updateComType<?= $row['com_id'] ?>').on('submit', function(e) {
			e.preventDefault();
			var updateComType = $('#updateComType<?= $row['com_id'] ?>').serialize();
			console.log(updateComType)
			swal.fire({
				title: "Are you sure you want to update this record?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#f6c23e',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/edit-complaint-type-query.php",
						data: updateComType,
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