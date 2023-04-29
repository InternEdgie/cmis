<div class="modal fade" id="addStatusModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/add-status-query.php" auto_complete="off">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fas fa-database mr-2"></i>Add Status</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="status">Status Name:</label>
						<input type="text" class="form-control" placeholder="Enter status..." id="status" name="status">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" placeholder="Enter description..." id="description" name="description"></textarea>
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