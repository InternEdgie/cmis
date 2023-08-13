<div class="modal fade" id="addScheduleModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" id="insertSchedule">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-calendar mr-2"></i>Set Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fc_id">Set Schedule For: <span class="text-danger">*</span></label>
                        <!-- <input type="text" class="form-control" placeholder="Enter status..." id="status" name="status" required> -->
                        <select name="fc_id" id="fc_id" class="for_schedule" required>
                            <option value="" selected disabled></option>
                            <?php if ($fcr->num_rows > 0) : ?>
                                <?php while ($row = $fcr->fetch_assoc()) : ?>
                                    <?php
                                    $fc_id = $row['fc_id'];
                                    $sched_r = $connection->query("SELECT * FROM tbl_schedules s, tbl_file_complaint fc WHERE s.fc_id = '$fc_id' AND s.sched_type = 0");
                                    if ($row['fc_type'] == '0') {
                                        $resident = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '{$row['comp_id']}'")->fetch_assoc();
                                        $complainant_name = $resident['res_lname'] . ', ' . $resident['res_fname'];
                                    } else {
                                        $nresident = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '{$row['comp_id']}'")->fetch_assoc();
                                        $complainant_name = $nresident['nres_lname'] . ', ' . $nresident['nres_fname'];
                                    }
                                    $resident = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '{$row['resp_id']}'")->fetch_assoc();
                                    $respondent_name = $resident['res_lname'] . ', ' . $resident['res_fname'];
                                    if ($sched_r->num_rows == 0) {
                                    ?>
                                        <option value="<?= $row['fc_id'] ?>"><?= $row['fc_id'] ?> | <?= $complainant_name . ' - ' . $respondent_name ?> </option>
                                    <?php
                                    }
                                    ?>
                                <?php endwhile ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Date:</label>
                                <input type="date" name="start" id="start" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label>Event: <span class="text-danger">*</span></label>
                                <select name="event_id" id="event_id" class="event" required>
                                    <option value="" selected disabled></option>
                                    <?php if ($events->num_rows > 0) : ?>
                                        <?php while ($row = $events->fetch_assoc()) : ?>
                                            <option value="<?= $row['event_id'] ?>"><?= $row['event_name'] ?></option>
                                        <?php endwhile ?>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sched_details">Note:</label>
                        <textarea class="form-control" placeholder="Enter description..." id="sched_details" name="sched_details"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm text-gray-900" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>