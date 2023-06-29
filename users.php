<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$user = $connection->query("SELECT * FROM tbl_users u, tbl_lupon l, tbl_residents r WHERE u.lupon_id = l.lupon_id AND l.res_id = r.res_id AND l.status = 1");
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Users</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 align-self-center text-right">
				<a href="#" class="d-none d-sm-inline-block ml-auto btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addUserModal">
					<span class="icon text-white-50">
						<i class="bi bi-person-plus-fill"></i>
					</span>
					<span class="text">Add</span>
				</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content pb-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold">LIST OF USERS</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="table_desc" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Username</th>
										<th>Position</th>
										<th>Role</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($user->num_rows > 0) {
										while ($row = $user->fetch_assoc()) {
									?>
											<tr>
												<td><?= $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'] ?></td>
												<td><?= $row['user_username'] ?></td>
												<td>
													<?php
													$pos_id = $row['pos_id'];
													$p = "SELECT * FROM tbl_positions WHERE pos_id = '$pos_id'";
													$pdata = $connection->query($p)->fetch_assoc();
													echo $pdata['pos_name']
													?>
												</td>
												<td>
													<?php
													if ($row['role'] == 0) {
														echo "User";
													} else {
														echo "Administrator";
													}
													?>
												</td>
												<td class="text-center"><a href="" class="d-none d-sm-inline-block btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editUserModal<?= $row['user_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
											</tr>
									<?php
											include 'assets/modals/edit-user-modal.php';
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
	</div>
</section>

<?php
include 'assets/modals/add-user-modal.php';
include 'layouts/footer.php';
?>