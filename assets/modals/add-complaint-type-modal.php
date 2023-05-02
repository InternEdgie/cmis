<div class="modal fade" id="addComplaintTypeModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/add-complaint-type-query.php" auto_complete="off">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fas fa-database mr-2"></i>Add Complaint Type</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="complaint_type">Complaint Type Name:</label>
						<input type="text" class="form-control" placeholder="Enter complaint type..." id="complaint_type" name="complaint_type" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
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