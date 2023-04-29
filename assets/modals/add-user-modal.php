<div class="modal fade" id="addUserModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/add-resident-query.php" auto_complete="off">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-person-plus-fill mr-2 text-success"></i>ADD USER</h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="lupon_id">Fullname: <span class="text-danger">*</span></label>
						<select class="form-control select2" name="lupon_id" required>
							<option value="" selected disabled>Select From Lupon</option>
							<?php
							$res = "SELECT * FROM tbl_lupon l, tbl_residents r WHERE l.res_id = r.res_id AND l.status = 1";
							$rr = $connection->query($res);
							while ($row = $rr->fetch_assoc()) {
								$lupon_id = $row['lupon_id'];
								$user = $connection->query("SELECT * FROM tbl_users WHERE lupon_id = '$lupon_id'");
								?>
								<option value="<?= $row['lupon_id'] ?>" <?= $user->num_rows > 0 ? 'disabled' : '' ?>><?= $row['res_fname'] . ' ' . $row['res_lname'] ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username: </label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="password">Password: </label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="role">Role: </label>
						<select class="form-control" name="role" required>
							<option value="" selected disabled>Select Role</option>
							<option value="0">User</option>
							<option value="1">Administrator</option>
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