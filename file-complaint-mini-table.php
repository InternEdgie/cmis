<div class="table-responsive">
    <table class="table table-striped text-dark">
        <thead class="bg-gray-900 text-white">
            <tr>
                <th>ENTRY NO.</th>
                 <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $fcr->fetch_assoc()) {
                $fc_stat = $row['status_id'];
                // if ($fc_stat != 2 && $fc_stat != 3 && $fc_stat != 5 && $fc_stat != 6) {
                    ?>
                    <tr>
                        <th><?= $row['fc_id'] ?></th>
                        <td class="text-center">
                            <?php
                            $fc_id = $row['fc_id'];
                            $sched_r = $connection->query("SELECT * FROM tbl_schedules s, tbl_file_complaint fc WHERE s.fc_id = '$fc_id'");
                            if ($sched_r->num_rows > 0) {
                                ?>
                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewScheduleModal<?= $row['fc_id'] ?>" data-toggle="tooltip" title="Scheduled">
                                    <i class="fa fa-calendar-check"></i>
                                </a>
                                <?php
                            } else {
                                ?>
                                <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-target="#addScheduleModal2<?= $row['fc_id'] ?>" data-toggle="tooltip" title="Set New Schedule"hhh>
                                    <i class="fa fa-calendar-times"></i>
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                // }
                // include 'assets/modals/view-schedule-modal2.php';
            }
            ?>
        </tbody>
    </table>
</div>