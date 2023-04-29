<div class="modal fade" id="editUserModal<?= $row['user_id'] ?>" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/add-resident-query.php" auto_complete="off">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-pencil-square mr-2 text-warning"></i>EDIT USER</h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="lupon_id">Fullname: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="<?= $row['res_fname'] . ' ' . $row['res_mname'] . ' ' . $row['res_lname'] ?>" disabled>
					</div>
					<div class="form-group">
						<label for="username">Username: </label>
						<input type="text" class="form-control" name="username" id="username" value="<?= $row['user_username'] ?>" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="password">Password: </label>
						<input type="password" class="form-control" name="password" id="password" value="<?= $row['user_password'] ?>" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="role">Role: </label>
						<select class="form-control" name="role" required>
							<option value="" disabled>Select Role</option>
							<option value="0" <?= $row['role'] == 0 ? 'selected' : '' ?>>User</option>
							<option value="1" <?= $row['role'] == 1 ? 'selected' : '' ?>>Administrator</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success btn-sm text-white" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>