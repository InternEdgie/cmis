<div class="modal" id="proceedToSummonModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="proceedToSummon">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-file-alt mr-2"></i> File Complaint</h5>
                    <button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="resp_id" name="resp_id" value="<?= $row['resp_id'] ?>">
                    <input type="hidden" id="comp_id" name="comp_id" value="<?= $row['comp_id'] ?>">
                    <input type="hidden" id="fc_type" name="fc_type" value="<?= $row['inv_type'] ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="font-weight-bold">Complainant</span>
                        </div>
                        <div class="col-md-9">: <?= $comp_fullname ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="font-weight-bold">Respondent</span>
                        </div>
                        <div class="col-md-9">: <?= $resp_fullname ?></div>
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <select name="com_id" id="com_id" class="form-control com_id" required>
                            <option value="" selected disabled></option>
                            <?php if ($complaint_type->num_rows > 0) : ?>
                                <?php while ($row = $complaint_type->fetch_assoc()) : ?>
                                    <option value="<?= $row['com_id'] ?>"><?= $row['com_name'] ?></option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success add-complaint-type" title="Add Complaint Type"><i class="bi bi-plus-circle"></i></button>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="fc_statement" id="fc_statement" rows="3" class="form-control" placeholder="Reason for Complaint" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>