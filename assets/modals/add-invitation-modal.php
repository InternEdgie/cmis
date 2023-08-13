<div class="modal" id="invitationModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="insertInvitation">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-file-alt mr-2"></i>INVITATION <span class="border-left pl-3 ml-2 border-dark"><?= $inv_id ?></span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="inv_id" id="inv_id" value="<?= $inv_id ?>" class="form-control" readonly>
                    <div class="bs-stepper linear">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step active" data-target="#respondent-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="respondent-part" id="respondent-part-trigger" aria-selected="true">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label" id="respondent_label">Respondent</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#complainant-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="complainant-part" id="complainant-part-trigger" aria-selected="false" disabled>
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label d-none" id="complainant_label">Complainant</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#other-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="other-part" id="other-part-trigger" aria-selected="false" disabled>
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label d-none" id="other_details_label">Set Schedule</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content mt-3">
                            <div id="bs-stepper-content">
                                <div id="respondent-part" class="content active" role="tabpanel" aria-labelledby="respondent-part-trigger">
                                    <div class="input-group mb-3">
                                        <select name="resp_id" id="resp_id" class="form-control resp_id" required>
                                            <option value="" selected disabled></option>
                                            <?php if ($respondents->num_rows > 0) : ?>
                                                <?php while ($row = $respondents->fetch_assoc()) : ?>
                                                    <option value="<?= $row['res_id'] ?>"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></option>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success add-resident-respondent" title="Add Resident"><i class="bi bi-person-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="complainant-part" class="content" role="tabpanel" aria-labelledby="complainant-part-trigger">
                                    <select name="inv_type" id="inv_type" class="form-control inv_type" required>
                                        <option value="" selected disabled>Complainant Type</option>
                                        <option value="0">Resident</option>
                                        <option value="1">Non-Resident</option>
                                    </select>

                                    <div class="mt-3 d-none" id="select-res-complainant">
                                        <div class="input-group mb-3">
                                            <select name="res_comp_id" id="res_comp_id" class="form-control res_comp_id" disabled>
                                                <option value="" selected disabled></option>
                                                <!-- <option value="0">&oplus; Add Resident</option> -->
                                                <?php if ($res_complainants->num_rows > 0) : ?>
                                                    <?php while ($row = $res_complainants->fetch_assoc()) : ?>
                                                        <option value="<?= $row['res_id'] ?>"><?= $row['res_lname'] . ', ' . $row['res_fname'] ?></option>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success add-resident-complainant" title="Add Resident"><i class="bi bi-person-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-none" id="select-nres-complainant">

                                        <div class="input-group mb-3">
                                            <select name="nres_comp_id" id="nres_comp_id" class="form-control nres_comp_id" disabled>
                                                <option value="" selected disabled></option>
                                                <?php if ($nres_complainants->num_rows > 0) : ?>
                                                    <?php while ($row = $nres_complainants->fetch_assoc()) : ?>
                                                        <option value="<?= $row['nres_id'] ?>"><?= $row['nres_lname'] . ', ' . $row['nres_fname'] ?></option>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success add-non-resident" title="Add Non-Resident"><i class="bi bi-person-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="other-part" class="content" role="tabpanel" aria-labelledby="other-part-trigger">
                                    <div class="form-group mt-3">
                                        <input type="date" class="form-control" placeholder="Schedule" id="start_date" name="start_date" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea name="sched_details" id="sched_details" rows="3" class="form-control" placeholder="Enter details..."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="first_step">
                        <button class="btn btn-success" id="first_next" onclick="stepper.next()" disabled>Next</button>
                    </div>
                    <div id="second_step" class="d-none">
                        <button class="btn prev" id="first_prev" onclick="stepper.previous()" disabled>Previous</button>
                        <button class="btn btn-success next" id="second_next" onclick="stepper.next()" disabled>Next</button>
                    </div>
                    <div id="third_step" class="d-none">
                        <button class="btn prev" id="second_prev" onclick="stepper.previous()" disabled>Previous</button>
                        <button type="submit" class="btn btn-success" id="submit" name="submit" disabled>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>