<div class="modal fade" id="editEventModal<?= $row['event_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/edit-event-query.php" auto_complete="off">
				<input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
				<div class="modal-header">
					<h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-warning"></i>Edit Event</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="event">Event Name:</label>
						<input type="text" class="form-control" placeholder="Enter event..." id="event" value="<?= $row['event_name'] ?>" name="event" required>
					</div>
					<div class="form-group">
		                <label for="color">Color:</label>
		                <div class="input-group my-colorpicker2 colorpicker-element">
		                    <input type="text" class="form-control" data-original-title="Color" title="Color" name="color" id="color" placeholder="Choose Color..." value="<?= $row['event_color'] ?>" required>
		                    <div class="input-group-append">
		                     	<span class="input-group-text"><i class="fas fa-square" style="color: <?= $row['event_color'] ?>;"></i></span>
		                    </div>
		                </div>
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