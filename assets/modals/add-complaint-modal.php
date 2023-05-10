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
                            <div class="step active" data-target="#respondent-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="respondent-part" id="respondent-part-trigger" aria-selected="true">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Respondent</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#complainant-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="complainant-part" id="complainant-part-trigger" aria-selected="false" disabled>
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Complainant</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#other-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="other-part" id="other-part-trigger" aria-selected="false" disabled>
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Other Details</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="respondent-part" class="content active" role="tabpanel" aria-labelledby="respondent-part-trigger">
                                <select name="resp_id" id="resp_id" class="form-control resp_id" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">&oplus; Add Resident</option>
                                    <?php if ($respondents->num_rows > 0) : ?>
                                        <?php while ($row = $respondents->fetch_assoc()) : ?>
                                            <option value="<?= $row['res_id'] ?>"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                                <div class="border-top mt-3 pt-3 d-none" id="add-resident-respondent">
                                    <div class="text-center h4 mb-3">Resident Information (Respondent)</div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="res_fname">First Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="First Name" id="res_fname" name="res_fname" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="res_mname">Middle Name:</label>
                                                <input type="text" class="form-control" placeholder="Middle Name" id="res_mname" name="res_mname" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="res_lname">Last Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Last Name" id="res_lname" name="res_lname" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="res_suffix">Suffix:</label>
                                                <input type="text" class="form-control" placeholder="Suffix" id="res_suffix" name="res_suffix" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="res_birthday">Birthday: <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="res_birthday" name="res_birthday" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="res_gender">Gender: <span class="text-danger">*</span></label>
                                                <select class="form-control" id="res_gender" name="res_gender" required disabled>
                                                    <option value="" disabled selected>Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="res_cstatus">Civil Status: <span class="text-danger">*</span></label>
                                                <select class="form-control" id="res_cstatus" name="res_cstatus" required disabled>
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
                                                <select class="form-control select2 form-select" id="zone_id" name="zone_id" required disabled>
                                                    <option value="" disabled selected>Select Zone</option>
                                                    <?php while ($zone_data = $zone_list->fetch_assoc()) : ?>
                                                        <option value="<?= $zone_data['zone_id'] ?>"><?= $zone_data['zone_name'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="res_contact">Contact Number: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" id="res_contact" name="res_contact" data-mask disabled>
                                    </div>
                                </div>
                            </div>
                            <div id="complainant-part" class="content" role="tabpanel" aria-labelledby="complainant-part-trigger">
                                <select name="fc_type" id="fc_type" class="form-control fc_type" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">Resident</option>
                                    <option value="1">Non-Resident</option>
                                </select>
                                <div class="mt-3 d-none" id="select-res-complainant">
                                    <select name="res_comp_id" id="res_comp_id" class="form-control res_comp_id" disabled>
                                        <option value="" selected disabled></option>
                                        <option value="0">&oplus; Add Resident</option>
                                        <?php if ($res_complainants->num_rows > 0) : ?>
                                            <?php while ($row = $res_complainants->fetch_assoc()) : ?>
                                                <option value="<?= $row['res_id'] ?>"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="border-top mt-3 pt-3 d-none" id="add-resident-complainant">
                                        <div class="text-center h4 mb-3">Resident Information (Complainant)</div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="res_fname">First Name: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="First Name" id="comp_res_fname" name="comp_res_fname" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="res_mname">Middle Name:</label>
                                                    <input type="text" class="form-control" placeholder="Middle Name" id="comp_res_mname" name="comp_res_mname" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="res_lname">Last Name: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Last Name" id="comp_res_lname" name="comp_res_lname" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="res_suffix">Suffix:</label>
                                                    <input type="text" class="form-control" placeholder="Suffix" id="comp_res_suffix" name="comp_res_suffix" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="res_birthday">Birthday: <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="comp_res_birthday" name="comp_res_birthday" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="res_gender">Gender: <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="comp_res_gender" name="comp_res_gender" required disabled>
                                                        <option value="" disabled selected>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="res_cstatus">Civil Status: <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="comp_res_cstatus" name="comp_res_cstatus" required disabled>
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
                                                    <select class="form-control select2 form-select" id="comp_zone_id" name="comp_zone_id" required disabled>
                                                        <option value="" disabled selected>Select Zone</option>
                                                        <?php while ($zone_data = $zone_list->fetch_assoc()) : ?>
                                                            <option value="<?= $zone_data['zone_id'] ?>"><?= $zone_data['zone_name'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="res_contact">Contact Number: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "9999-999-9999"' placeholder="Contact Number" id="comp_res_contact" name="comp_res_contact" data-mask disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 d-none" id="select-nres-complainant">
                                    <select name="nres_comp_id" id="nres_comp_id" class="form-control nres_comp_id" disabled>
                                        <option value="" selected disabled></option>
                                        <option value="0">&oplus; Add Non-Resident</option>
                                        <?php if ($nres_complainants->num_rows > 0) : ?>
                                            <?php while ($row = $nres_complainants->fetch_assoc()) : ?>
                                                <option value="<?= $row['nres_id'] ?>"><?= $row['nres_lname'] . ', ' . $row['nres_fname'] ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="border-top mt-3 pt-3 d-none" id="add-non-resident-complainant">
                                        <div class="text-center h4 mb-3">Non-Resident Information (Complainant)</div>
                                    </div>
                                </div>
                            </div>
                            <div id="other-part" class="content" role="tabpanel" aria-labelledby="other-part-trigger">
                                <select name="com_id" id="com_id" class="form-control com_id" required>
                                    <option value="" selected disabled></option>
                                    <option value="0">&oplus; Add Resident</option>
                                    <?php if ($complaint_type->num_rows > 0) : ?>
                                        <?php while ($row = $complaint_type->fetch_assoc()) : ?>
                                            <option value="<?= $row['com_id'] ?>"><?= $row['com_name'] ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                                <div class="form-group mt-3">
                                    <label for="">Reason for Complaint</label>
                                    <textarea name="fc_statement" id="fc_statement" rows="3" class="form-control" placeholder="Reason for Complaint"></textarea>
                                </div>
                                
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