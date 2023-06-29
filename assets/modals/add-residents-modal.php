<div class="modal" id="addResidentModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="insertResident" method="POST" auto_complete="off">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold">Add Resident</h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
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
								<select class="form-control form-select" id="gender" name="gender" required>
									<option value="" disabled selected>Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="civil_status">Civil Status: <span class="text-danger">*</span></label>
								<select class="form-control form-select" id="civil_status" name="civil_status" required>
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
									<?php while ($zone_data = $zone_list->fetch_assoc()): ?>
										<option value="<?= $zone_data['zone_id'] ?>"><?= $zone_data['zone_name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contact">Contact Number: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="contact" name="contact" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Contact Number" required>
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