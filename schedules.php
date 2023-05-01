<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$fc = "SELECT * FROM tbl_file_complaint";
$fcr = $connection->query($fc);
$fcr2 = $connection->query($fc);
$fcr3 = $connection->query($fc);

$schedules = $connection->query("SELECT * FROM tbl_schedules sc, tbl_events ev, tbl_file_complaint fc WHERE sc.event_id = ev.event_id AND sc.fc_id = fc.fc_id");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
	$row['sdate'] = date("F d, Y",strtotime($row['start_date']));
	$sched_res[$row['fc_id'] . $row['event_id']] = $row;
}
$events = $connection->query("SELECT * FROM tbl_events LIMIT 0, 2");

$events2 = "SELECT * FROM tbl_events LIMIT 0, 2";
// $events_r2 = $connection->query($events2);

$remarks = $connection->query("SELECT * FROM tbl_remarks");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">SCHEDULES</h1>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-warning">
              	<h6 class="m-0 font-weight-bold text-dark">CALENDAR</h6>
            </div>
            <div class="card-body">
            	<?php //include 'assets/modals/add-schedule-modal.php' ?>
            	<?php //include 'assets/modals/view-schedule-modal.php' ?>
            	<?php //include 'assets/modals/update-schedule-modal.php' ?>
            	<div class="row">
            		<div class="col-lg-12 col-md-12 col-sm-12" id="page-calendar">
            			<div id="calendar"></div>
            		</div>
            	</div>
        	</div>
        </div>
	</div>
</div>
<?php
    if(isset($connection)) $connection->close();
?>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
</script>
<script src="./assets/js/script.js"></script>
<?php
include 'layouts/footer.php';
?>