<div class="modal fade" id="editZoneModal<?= $row['zone_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/edit-zone-query.php" auto_complete="off">
				<input type="hidden" name="zone_id" value="<?= $row['zone_id'] ?>">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-warning"></i>Edit Zone</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="zone">Zone Name:</label>
						<input type="text" class="form-control" placeholder="Enter zone..." id="zone" value="<?= $row['zone_name'] ?>" name="zone" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" value="<?= $row['zone_description'] ?>" name="description" required><?= $row['zone_description'] ?></textarea>
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