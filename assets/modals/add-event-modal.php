<div class="modal fade" id="addEventModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/add-event-query.php" auto_complete="off">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fas fa-database mr-2"></i>Add Event</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="event">Event Name:</label>
						<input type="text" class="form-control" placeholder="Enter event..." id="event" name="event" required>
					</div>
					<div class="form-group">
		                <label for="color">Color:</label>
		                <div class="input-group my-colorpicker2 colorpicker-element">
		                    <input type="text" class="form-control" data-original-title="Color" title="Color" name="color" id="color" placeholder="Choose Color..." required>
		                    <div class="input-group-append">
		                     	<span class="input-group-text"><i class="fas fa-square" style="color: rgb(221, 79, 79);"></i></span>
		                    </div>
		                </div>
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