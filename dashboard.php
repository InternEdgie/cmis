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

// echo $_SESSION['success'];
?>

<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
		</div>
        <?php include 'config/message.php'; ?>
        <div class="row">
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-primary shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Lupong Tagapamayapa</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_lupon ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-users fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-success shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Active Members</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_active ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-users fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-info shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Total Residents</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_residents ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-users fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-warning shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Total Non-Residents</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_non_residents ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-users fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-danger shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Total Filed Complaints<br>(Month of <?= date('F') ?>)</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $monthly_complaints ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-file-alt fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-secondary shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Total Filed Complaints<br>(Year of <?= date('Y') ?>)</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $yearly_complaints ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-file-alt fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
         	<div class="col-xl-3 col-md-6 mb-4">
         		<div class="card border-left-primary shadow h-100 py-2">
         			<div class="card-body">
         				<div class="row no-gutters align-items-center">
         					<div class="col mr-2">
         						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-truncate">Total Filed Complaints<br>(Overall)</div>
         						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $filed_complaints ?></div>
         					</div>
         					<div class="col-auto">
         						<i class="fas fa-file-alt fa-2x text-gray-300"></i>
         					</div>
         				</div>
         			</div>
         		</div>
         	</div>
        </div>

        <div class="row">
            <!-- Bar Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">FILED CASES</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="filedCases"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-3">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">EVENTS</h6>
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
	</div>
</div>

<?php
include 'layouts/footer.php';
?>