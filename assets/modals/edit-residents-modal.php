<?php $zone_list2 = $connection->query("SELECT * FROM tbl_zone"); ?>
<div class="modal fade" id="editResidentModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="config/queries/edit-resident-query.php" auto_complete="off">
				<input type="hidden" name="res_id" value="<?= $row['res_id'] ?>">
				<div class="modal-header">
					<h4 class="modal-title font-weight-bold"><i class="bi bi-pencil-square mr-2 text-warning"></i>EDIT | <span class="text-uppercase"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></span></h4>
					<button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name">First Name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="<?= $row['res_fname'] ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="middle_name">Middle Name:</label>
								<input type="text" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name" value="<?= $row['res_mname'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="last_name">Last Name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" value="<?= $row['res_lname'] ?>" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="suffix">Suffix:</label>
								<input type="text" class="form-control" placeholder="Suffix" id="suffix" name="suffix" value="<?= $row['res_suffix'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="birthday">Birthday: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="birthday" name="birthday" value="<?= $row['res_birthday'] ?>" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="gender">Gender: <span class="text-danger">*</span></label>
								<select class="form-control" id="gender" name="gender" required>
									<?php
									$gender = $row['res_gender'];
									?>
									<option value="" disabled>Select</option>
									<option <?= $gender == 'Male' ? 'selected' : '' ?>>Male</option>
									<option <?= $gender == 'Female' ? 'selected' : '' ?>>Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="civil_status">Civil Status: <span class="text-danger">*</span></label>
								<select class="form-control" id="civil_status" name="civil_status" required>
									<?php
									$cstatus = $row['res_cstatus'];
									?>
									<option value="" <?= $cstatus == '' ? 'selected' : '' ?> disabled>Select</option>
									<option <?= $cstatus == 'Single' ? 'selected' : '' ?>>Single</option>
									<option <?= $cstatus == 'Married' ? 'selected' : '' ?>>Married</option>
									<option <?= $cstatus == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
									<option <?= $cstatus == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
									<option <?= $cstatus == 'Separated' ? 'selected' : '' ?>>Separated</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label for="zone">Zone: <span class="text-danger">*</span></label>
								<select class="form-control select2 form-select" id="zone_id" name="zone_id" required>
									<option value="" disabled>Select Zone</option>
									<?php
									$zid = $row['zone_id'];
									$zone = "SELECT * FROM tbl_zone";
									$result = $connection->query($zone);
									while ($zonedata = $result->fetch_array()) {
										if ($zid == $zonedata['zone_id']) {
											?>
											<option value="<?= $zid ?>" selected><?= $zonedata['zone_name']; ?></option>
											<?php
										} else {
											?>
											<option value="<?= $zonedata['zone_id'] ?>"><?= $zonedata['zone_name']; ?></option>
											<?php
										}

									}

									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="contact">Contact Number: <span class="text-danger">*</span></label>
						<input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" value="<?= $row['res_contact'] ?>" id="contact" name="contact" data-mask>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-warning text-gray-900 btn-sm" name="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>