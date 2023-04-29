<div class="modal fade" id="editLuponModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data" action="config/queries/edit-lupon-query.php">
				<input type="hidden" name="res_id" value="<?= $id ?>">
				<input type="hidden" name="lupon_id" value="<?= $row['lupon_id'] ?>">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-pencil-square mr-2 text-warning"></i>EDIT LUPON</h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="res_id">Fullname: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="<?= $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_lname'] . ' ' . $row['res_suffix'] ?>" disabled>
					</div>
					<div class="form-group">
						<label for="pos_id">Position: <span class="text-danger">*</span></label>
						<select class="select2 form-control" name="pos_id" id="pos_id" required>
							<option value="" selected disabled>Select Position</option>
							<?php
							$pos_id = $row['pos_id'];
							$positions = "SELECT * FROM tbl_positions";
							$result_pos = $connection->query($positions);
							while ($row_pos = $result_pos->fetch_assoc()) {
								if ($pos_id == $row_pos['pos_id']) {
									?>
									<option value="<?= $row_pos['pos_id'] ?>" selected><?= $row_pos['pos_name'] ?></option>
									<?php
								} else {
									?>
									<option value="<?= $row_pos['pos_id'] ?>"><?= $row_pos['pos_name'] ?></option>
									<?php
								}
								
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="status">Position: <span class="text-danger">*</span></label>
						<select class="form-control" name="status" id="status" required>
							<option value="1" <?= $row['status'] == 1 ? 'selected' : '' ?>>Active</option>
							<option value="0" <?= $row['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-warning btn-sm text-gray-900" name="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>



