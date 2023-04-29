<div class="modal fade" id="addLuponModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data" action="config/queries/add-lupon-query.php">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-person-plus-fill mr-2 text-success"></i>ADD LUPON MEMBER/OFFICIAL</h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="res_id">Fullname: <span class="text-danger">*</span></label>
						<select class="select2 form-control" name="res_id" id="res_id" required>
							<option value="" selected disabled>Select From Resident</option>
							<option value="add">Add Resident</option>
							<?php
							$resident = "SELECT * FROM tbl_residents";
							$result_res = $connection->query($resident);
							while ($row_res = $result_res->fetch_assoc()) {
								$res_id = $row_res['res_id'];
								$lupon = $connection->query("SELECT * FROM tbl_lupon WHERE res_id = '$res_id'");
								if ($lupon->num_rows == 0) {
									?>
									<option value="<?= $row_res['res_id'] ?>"><?= $row_res['res_fname'] . ' ' . $row_res['res_mname'] . ' ' . $row_res['res_lname'] ?></option>
									<?php
								} else {
									?>
									<option value="<?= $row_res['res_id'] ?>" disabled><?= $row_res['res_fname'] . ' ' . $row_res['res_mname'] . ' ' . $row_res['res_lname'] ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>
					<div id="add-resident" style="display: none">
						<hr>
						<h5 class="text-center">Lupon Information</h5>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="first_name">First Name: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="middle_name">Middle Name:</label>
									<input type="text" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="last_name">Last Name: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="suffix">Suffix:</label>
									<input type="text" class="form-control" placeholder="Suffix" id="suffix" name="suffix">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="birthday">Birthday: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="birthday" name="birthday" required>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="gender">Gender: <span class="text-danger">*</span></label>
									<select class="form-control" id="gender" name="gender" required>
										<option value="" disabled selected>Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="civil_status">Civil Status: <span class="text-danger">*</span></label>
									<select class="form-control" id="civil_status" name="civil_status" required>
										<option value="" disabled selected>Civil Status</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Widowed">Widowed</option>
										<option value="Divorced">Divorced</option>
										<option value="Separated">Separated</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="zone">Zone: <span class="text-danger">*</span></label>
									<select class="form-control select2 form-select" id="zone_id" name="zone_id" required>
										<option value="" disabled selected>Select Zone</option>
										<?php $zone_list = $connection->query("SELECT * FROM tbl_zone"); ?>
										<?php while ($zone_data = $zone_list->fetch_assoc()): ?>
											<option value="<?= $zone_data['zone_id'] ?>"><?= $zone_data['zone_name'] ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="contact">Contact Number: <span class="text-danger">*</span></label>
							<input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" id="contact" name="contact" data-mask required>
						</div>
					</div>
					<div class="form-group">
						<label for="pos_id">Position: <span class="text-danger">*</span></label>
						<select class="select2 form-control" name="pos_id" id="pos_id" required>
							<option value="" selected disabled>Select Position</option>
							<?php
							$positions = "SELECT * FROM tbl_positions";
							$result_pos = $connection->query($positions);
							while ($row_pos = $result_pos->fetch_assoc()) {
								?>
								<option value="<?= $row_pos['pos_id'] ?>"><?= $row_pos['pos_name'] ?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	const add_r = document.getElementById('add-resident');
	var ss = $('#res_id').on('change', function(sel) {
		var val = ss.val();

		// document.getElementById('firstname').removeAttribute('required');
		if (val == 'add') {
			$('.modal').find('.modal-dialog').addClass('modal-lg');
			add_r.style.display = 'block';
			document.getElementById('first_name').setAttribute('required', '');
			document.getElementById('last_name').setAttribute('required', '');
			document.getElementById('birthday').setAttribute('required', '');
			document.getElementById('gender').setAttribute('required', '');
			document.getElementById('civil_status').setAttribute('required', '');
			document.getElementById('zone_id').setAttribute('required', '');
			document.getElementById('contact').setAttribute('required', '');
		} else {
			$('.modal').find('.modal-dialog').removeClass('modal-lg');
			add_r.style.display = 'none';
			document.getElementById('first_name').removeAttribute('required');
			document.getElementById('last_name').removeAttribute('required');
			document.getElementById('birthday').removeAttribute('required');
			document.getElementById('gender').removeAttribute('required');
			document.getElementById('civil_status').removeAttribute('required');
			document.getElementById('zone_id').removeAttribute('required');
			document.getElementById('contact').removeAttribute('required');
		}
	});
</script>



