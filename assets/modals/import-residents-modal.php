<div class="modal fade" id="importResidentsModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/import-residents-query.php" auto_complete="off">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fas fa-file-download mr-3"></i>Import Residents</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="input-group">
						<input type="file" name="excel" id="excel" class="custom-file-input" required>
						<label class="custom-file-label">Choose CSV/Excel File</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success btn-sm" name="submit" value="Import" data-loading-text="Loading...">
				</div>
			</form>
		</div>
	</div>
</div>