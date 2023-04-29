<?php $citizenship = $connection->query("SELECT * FROM tbl_citizenship"); ?>
<div class="modal fade" id="editNonResidentModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/edit-non-resident-query.php" auto_complete="off">
				<input type="hidden" name="nres_id" value="<?= $id ?>">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-pencil-square mr-2 text-warning"></i>EDIT | <span class="text-uppercase"><?= $row['nres_lname'] . ', ' . $row['nres_fname'] ?></span></h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name">First Name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="<?= $row['nres_fname'] ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="middle_name">Middle Name:</label>
								<input type="text" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name" value="<?= $row['nres_mname'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="last_name">Last Name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" value="<?= $row['nres_lname'] ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="suffix">Suffix:</label>
								<input type="text" class="form-control" placeholder="Suffix" id="suffix" name="suffix" value="<?= $row['nres_suffix'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="birthday">Birthday: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="birthday" name="birthday" value="<?= $row['nres_birthday'] ?>" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="gender">Gender: <span class="text-danger">*</span></label>
								<select class="form-control" id="gender" name="gender" required>
									<option value="" disabled selected>Gender</option>
									<option value="Male" <?= $row['nres_gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
									<option value="Female" <?= $row['nres_gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="civil_status">Civil Status: <span class="text-danger">*</span></label>
								<select class="form-control" id="civil_status" name="civil_status" required>
									<option value="" disabled selected>Civil Status</option>
									<option value="Single" <?= $row['nres_cstatus'] == 'Single' ? 'selected' : '' ?>>Single</option>
									<option value="Married" <?= $row['nres_cstatus'] == 'Married' ? 'selected' : '' ?>>Married</option>
									<option value="Widowed" <?= $row['nres_cstatus'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
									<option value="Divorced" <?= $row['nres_cstatus'] == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
									<option value="Separated" <?= $row['nres_cstatus'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="zone">Citizenship: <span class="text-danger">*</span></label>
								<select class="form-control select2 form-select" id="citizenship_id" name="citizenship_id" required>
									<option value="" disabled selected>Citizenship</option>
									<?php while ($cdata2 = $citizenship->fetch_assoc()): ?>
										<!-- <option value="<?= $cdata['citizenship_id'] ?>" <?= $cdata2['citizenship_id'] == $citizenship_id ? 'selected' : '' ?>><?= $cdata2['citizenship_name'] ?></option> -->
										<?php if ($citizenship_id == $cdata2['citizenship_id']): ?>
											<option value="<?= $citizenship_id ?>" selected><?= $cdata2['citizenship_name'] ?></option>
										<?php else: ?>
											<option value="<?= $cdata2['citizenship_id'] ?>"><?= $cdata2['citizenship_name'] ?></option>
										<?php endif; ?>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label for="last_name">Zone: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Zone" id="zone" name="zone" value="<?= $row['nres_zone'] ?>" required>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label for="suffix">Barangay: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Barangay" id="barangay" name="barangay" value="<?= $row['nres_barangay'] ?>" required>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label for="suffix">Municipality: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Municipality" id="city" name="city" value="<?= $row['nres_city'] ?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<label for="last_name">Province: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Province" id="province" name="province" value="<?= $row['nres_province'] ?>" required>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="suffix">Zip Code: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Zip Code" id="zcode" name="zcode" value="<?= $row['nres_zcode'] ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contact">Contact Number: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" id="contact" name="contact" value="<?= $row['nres_contact'] ?>" data-mask required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn text-gray-900 btn-sm" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-warning btn-sm text-gray-900" name="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>