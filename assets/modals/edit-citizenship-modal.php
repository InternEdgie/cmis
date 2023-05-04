<div class="modal fade" id="editCitizenshipModal<?= $row['citizenship_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" id="updateCitizenship<?= $row['citizenship_id'] ?>">
				<input type="hidden" name="citizenship_id" value="<?= $row['citizenship_id'] ?>">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-warning"></i>Edit Citizenship</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="citizenship">Citizenship Name:</label>
						<input type="text" class="form-control" placeholder="Enter citizenship..." id="citizenship" value="<?= $row['citizenship_name'] ?>" name="citizenship" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" value="<?= $row['citizenship_description'] ?>" name="description" required><?= $row['citizenship_description'] ?></textarea>
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

		$('#updateCitizenship<?= $row['citizenship_id'] ?>').on('submit', function(e) {
			e.preventDefault();
			var updateCitizenship = $('#updateCitizenship<?= $row['citizenship_id'] ?>').serialize();
			console.log(updateCitizenship)
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
						url: "config/queries/edit-citizenship-query.php",
						data: updateCitizenship,
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