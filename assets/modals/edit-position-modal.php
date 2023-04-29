<div class="modal fade" id="editPositionModal<?= $row['pos_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/edit-position-query.php" auto_complete="off">
				<input type="hidden" name="pos_id" value="<?= $row['pos_id'] ?>">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-warning"></i>Edit Position</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="position">Position Name:</label>
						<input type="text" class="form-control" placeholder="Enter position..." id="position" value="<?= $row['pos_name'] ?>" name="position" required>
					</div>
					<div class="form-group">
						<label for="pos_description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" value="<?= $row['pos_description'] ?>" name="description" required><?= $row['pos_description'] ?></textarea>
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