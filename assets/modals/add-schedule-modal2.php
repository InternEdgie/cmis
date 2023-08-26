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
                        <!-- <label for="fc_id">Set Schedule For: <span class="text-danger">*</span></label> -->
                        <input type="hidden" name="fc_id" id="fc_id">
                        <div class="row">
                            <div class="col-md-3 font-weight-bold">Entry No: </div>
                            <div class="col-md" id="entry-number"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 font-weight-bold">Complainant: </div>
                            <div class="col-md" id="complainant-name"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 font-weight-bold">Respondent: </div>
                            <div class="col-md" id="respondent-name"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Date: <span class="text-danger">*</span></label>
                                <input type="date" name="start" id="start" class="form-control" min="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="from-group">
                                <label>Event: </label>
                                <?php $events = $connection->query("SELECT * FROM tbl_events LIMIT 1")->fetch_assoc(); ?>
                                <input type="text" class="form-control" value="<?= $events['event_name'] ?>" readonly>
                                <input type="hidden" value="<?= $events['event_id'] ?>" name="event_id" id="event_id">
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