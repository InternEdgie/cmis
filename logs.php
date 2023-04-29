<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$logs = $connection->query("SELECT * FROM tbl_logs ORDER BY log_id DESC");
?>

<div id="content">
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">LOGS</h1>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
              	<h6 class="m-0 font-weight-bold">LIST OF USER ACTIVITIES</h6>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-striped border text-dark" id="table_desc" width="100%">
            			<thead class="bg-gray-900 text-white">
            				<tr>
								<th style="width: 10%">ID</th>
								<th style="width: 15%">User</th>
								<th style="width: 50%">Actions</th>
								<th class="text-center" style="width: 25%">Time & Date</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
							if ($logs->num_rows > 0) {
								while ($row = $logs->fetch_assoc()) {
									?>
									<tr>
										<th class="align-middle"><?= $row['log_id'] ?></th>
										<td class="align-middle">
											<?php
											$user_id = $row['user_id'];
											$user = "SELECT * FROM tbl_users u, tbl_lupon l, tbl_residents r WHERE u.user_id = '$user_id' AND u.lupon_id = l.lupon_id AND r.res_id = l.res_id";
											$user_result = $connection->query($user);
											if ($user_id != "0") {
												$userdata = $user_result->fetch_assoc();
												echo $userdata['res_fname'] . ' ' . $userdata['res_lname'];
											} else {
												echo "<span class='text-danger'>Unknown</span>";
											}

											?>
										</td>
										<td class="align-middle"><?= $row['log_action'] ?></td>
										<td class="align-middle text-center"><?= date('F d, Y - h:i:s A', strtotime($row['log_datetime'])) ?></td>
									</tr>
									<?php
								}
							}
								
							?>
            			</tbody>
            		</table>
            	</div>
            </div>
		</div>
	</div>
</div>

<?php
include 'layouts/footer.php';
?>