<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$total_lupon = $connection->query("SELECT * FROM tbl_lupon")->num_rows;
$total_active = $connection->query("SELECT * FROM tbl_lupon WHERE status = 1")->num_rows;
$total_residents = $connection->query("SELECT * FROM tbl_residents")->num_rows;
$total_non_residents = $connection->query("SELECT * FROM tbl_non_residents")->num_rows;
$monthly_complaints = $connection->query("SELECT * FROM tbl_file_complaint WHERE DATE_FORMAT(fc_regdatetime, '%M') = DATE_FORMAT(NOW(), '%M')")->num_rows;
$yearly_complaints = $connection->query("SELECT * FROM tbl_file_complaint WHERE DATE_FORMAT(fc_regdatetime, '%Y') = DATE_FORMAT(NOW(), '%Y')")->num_rows;
$filed_complaints = $connection->query("SELECT * FROM tbl_file_complaint")->num_rows;

$filed_cases = $connection->query("SELECT *, count(fc.com_id) as count FROM tbl_file_complaint fc, tbl_complaint_type ct WHERE fc.com_id = ct.com_id GROUP BY fc.com_id ORDER BY ct.com_name ASC");
foreach ($filed_cases as $row) {
    $com_count[] = $row['count'];
    $com_short_name[] = substr($row['com_name'], 0, 7);
    $com_name = $row['com_name'];
}

$events = $connection->query("SELECT count(s.event_id) as count_ev, ev.event_name, ev.event_id, ev.event_color FROM tbl_schedules s, tbl_events ev WHERE s.event_id = ev.event_id GROUP BY s.event_id");
foreach($events as $srow) {
    $event_name[] = $srow['event_name'];
    $event_count[] = $srow['count_ev'];
    $event_color[] = $srow['event_color'];
}

$fc = $connection->query("SELECT * FROM tbl_file_complaint ORDER BY fc_id DESC LIMIT 5");

$respondents = $connection->query("SELECT * FROM tbl_residents ORDER BY res_lname ASC");
$res_complainants = $connection->query("SELECT * FROM tbl_residents ORDER BY res_lname ASC");
$nres_complainants = $connection->query("SELECT * FROM tbl_non_residents ORDER BY nres_lname ASC");
$zone_list = $connection->query("SELECT * FROM tbl_zone");
$zone_list2 = $connection->query("SELECT * FROM tbl_zone");
$complaint_type = $connection->query("SELECT * FROM tbl_complaint_type ORDER BY com_name ASC");
$citizenship = $connection->query("SELECT * FROM tbl_citizenship");

// echo $_SESSION['success'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content pb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_lupon ?></h3>

                        <p>Lupong Tagapamayapa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lupon.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_active ?></h3>

                        <p>Active Members</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lupon.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_residents ?></h3>

                        <p>Total Residents</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="residents.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_non_residents ?></h3>

                        <p>Total Non-Residents</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="non-residents.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $monthly_complaints ?></h3>

                        <p>Total Filed Complaints<br>(Month of <?= date('F') ?>)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="file-complaint.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $yearly_complaints ?></h3>

                        <p>Total Filed Complaints<br>(Year of <?= date('Y') ?>)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="file-complaint.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $filed_complaints ?></h3>

                        <p>Total Filed Complaints<br>(Overall)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="file-complaint.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Bar Chart -->
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-navy">FILED CASES</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="filedCases" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-md-6">
                <div class="card shadow h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between h-auto">
                        <h6 class="m-0 font-weight-bold text-navy">EVENTS</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-5 pb-3">
                            <canvas id="events"></canvas>
                        </div>
                        <div class="mt-1 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Invitation
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i> 1st Mediation
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color:orange"></i> 2nd Meditiation
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i> Conceliation
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card shadow h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <div class="card-title">
                            <h6 class="m-0 font-weight-bold text-navy card-title">RECENT FILED COMPLAINTS</h6>
                        </div>
                        
                        <div class="card-tools mr-1">
                            <a href="file-complaint.php">VIEW ALL</a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>Entry No.</th>
                                        <th>Complainant</th>
                                        <th>Respondent</th>
                                        <th>Nature of Case</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $fc->fetch_assoc()) : ?>
                                        <tr>
                                            <th class="align-middle"><?= $row['fc_id']; ?></th>
                                            <td>
                                                <?php
                                                $comp_id = $row['comp_id'];
                                                if ($row['fc_type'] == 0) {
                                                    $c_res = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$comp_id'")->fetch_assoc();
                                                    $comp_fullname = $c_res['res_fname'] . ' ' . $c_res['res_mname'] . ' ' . $c_res['res_lname'];
                                                } else if ($row['fc_type'] == 1) {
                                                    $c_nres = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id = '$comp_id'")->fetch_assoc();
                                                    $comp_fullname = $c_nres['nres_fname'] . ' ' . $c_nres['nres_mname'] . ' ' . $c_nres['nres_lname'];
                                                }
                                                echo $comp_fullname;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $resp_id = $row['resp_id'];
                                                $residents = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$resp_id'")->fetch_assoc();
                                                $resp_fullname = $residents['res_fname'] . ' ' . $residents['res_mname'] . ' ' . $residents['res_lname'];
                                                echo $resp_fullname;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $com = $row['com_id'];
                                                $c_query = "SELECT * FROM tbl_complaint_type WHERE com_id = '$com'";
                                                $c = $connection->query($c_query)->fetch_assoc();
                                                $com_type = $c['com_name'];
                                                if (strlen($com_type) >= 15) {
                                                    echo substr($com_type, 0, 15,) . '...';
                                                } else {
                                                    echo $com_type;
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $s_fc_id = $row['fc_id'];
                                                $schedule = "SELECT * FROM tbl_schedules WHERE fc_id = '$s_fc_id'";
                                                $check_sched = $connection->query($schedule);

                                                if ($check_sched->num_rows > 0) {
                                                    $fc_status_id = $row['status_id'];
                                                    $status = "SELECT * FROM tbl_status";
                                                    $status_r = $connection->query($status);
                                                    if ($fc_status_id != 0) {
                                                        while ($statdata = $status_r->fetch_assoc()) {
                                                            if ($fc_status_id == $statdata['status_id']) {
                                                                echo $statdata['status_name'];
                                                            }
                                                        }
                                                    } else {
                                                        echo "---";
                                                    }
                                                } else {
                                                    echo "<span class='text-muted'>Set Schedule</span>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Entry No.</th>
                                        <th>Complainant</th>
                                        <th>Respondent</th>
                                        <th>Nature of Case</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'layouts/footer.php';
?>