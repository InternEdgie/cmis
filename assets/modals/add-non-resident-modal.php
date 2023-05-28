<div class="modal" id="addNonResidentModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="insertNonResident" method="POST">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold">Add Non-Resident</h4>
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
								<label for="citizenship">Citizenship: <span class="text-danger">*</span></label>
								<select class="form-control select2 form-select" id="citizenship_id" name="citizenship_id" required>
									<option value="" disabled selected>Citizenship</option>
									<?php while ($cdata = $citizenship->fetch_assoc()): ?>
										<option value="<?= $cdata['citizenship_id'] ?>"><?= $cdata['citizenship_name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label for="zone">Zone: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Zone" id="zone" name="zone" required>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label for="barangay">Barangay: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Barangay" id="barangay" name="barangay" required>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label for="city">Municipality: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Municipality" id="city" name="city" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<label for="province">Province: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Province" id="province" name="province" required>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="zcode">Zip Code:</label>
								<input type="text" class="form-control" placeholder="Zip Code" id="zcode" name="zcode" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contact">Contact Number: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" id="contact" name="contact" data-mask required>
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