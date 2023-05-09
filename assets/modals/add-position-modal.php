<div class="modal fade" id="addPositionModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" id="insertPosition">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fas fa-database mr-2"></i>Add Position</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="position">Position Name:</label>
						<input type="text" class="form-control" placeholder="Enter position..." id="position" name="position" required>
					</div>
					<div class="form-group">
						<label for="pos_description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" name="description" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>