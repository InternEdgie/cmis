<div class="modal fade" id="fileComplaintModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" id="insertComType">
                <div class="modal-header" style="border-top: 5px solid red">
                    <h5 class="modal-title"><i class="fas fa-file-alt mr-2"></i>FILE COMPLAINT</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="bs-stepper linear">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step active" data-target="#respondent">
                                <button type="button" class="step-trigger" role="tab" disabled>
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Respondent</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#complainant">
                                <button type="button" class="step-trigger" role="tab" disabled>
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Complainant</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#complainant">
                                <button type="button" class="step-trigger" role="tab" disabled>
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Other Details</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="respondent-part" class="content active dstepper-block" role="tabpanel">
                                <select name="resp_id" id="resp_id" class="form-control select2">
                                    <option value="" selected disabled>Select Respondent</option>
                                    <option value="0">&oplus; Add Resident</option>
                                    <?php if ($respondents->num_rows > 0) : ?>
                                        <?php while ($row = $respondents->fetch_assoc()) : ?>
                                            <option value="<?= $row['res_id'] ?>"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                                <div class="border-top mt-3 pt-3 d-none" id="add-resident">
                                    <div class="text-center h4 mb-3">Resident Information (Respondent)</div>
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
                                                    <?php while ($zone_data = $zone_list->fetch_assoc()) : ?>
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
                            </div>
                            <div id="complainant-part" class="content" role="tabpanel">
                                Comp
                            </div>
                            <div id="other-part" class="content" role="tabpanel">
                                Other
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="first_step">
                        <button class="btn btn-primary" id="first_next" onclick="stepper.next()" disabled>Next</button>
                    </div>
                    <div id="second_step" class="d-none">
                        <button class="btn btn-primary prev" id="first_prev" onclick="stepper.previous()" disabled>Previous</button>
                        <button class="btn btn-primary next" id="second_next" onclick="stepper.next()" disabled>Next</button>
                    </div>
                    <div id="third_step" class="d-none">
                        <button class="btn btn-primary prev" id="second_prev" onclick="stepper.previous()" disabled>Previous</button>
                        <button type="submit" class="btn btn-primary" disabled>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>