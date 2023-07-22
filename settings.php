<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
$citizenship = $connection->query("SELECT * FROM tbl_citizenship");
$ct = $connection->query("SELECT * FROM tbl_complaint_type");
$events = $connection->query("SELECT * FROM tbl_events");
$positions = $connection->query("SELECT * FROM tbl_positions");
$status = $connection->query("SELECT * FROM tbl_status");
$zone = $connection->query("SELECT * FROM tbl_zone");
?>
<style>
    /* .dataTables_paginate {
        border: 1px;
    } */
    div.dataTables_paginate {
        text-align: center !important;
        display: flex;
        justify-content: center;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Settings</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content pb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Citizenship</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addCitizenshipModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($citizenship->num_rows > 0) {
                                        while ($row = $citizenship->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['citizenship_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editCitizenshipModal<?= $row['citizenship_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-dark"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-citizenship-modal.php';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Complaint Type</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addComplaintTypeModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($ct->num_rows > 0) {
                                        while ($row = $ct->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['com_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editComplaintTypeModal<?= $row['com_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-complaint-type-modal.php';
                                            // include 'assets/modals/view-profile-modal.php';
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
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Events</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addEventModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($events->num_rows > 0) {
                                        while ($row = $events->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><i class="bi bi-square-fill mr-2" style="color:<?= $row['event_color'] ?>" data-toggle="tooltip" title="<?= $row['event_color'] ?>"></i><?= $row['event_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editEventModal<?= $row['event_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-event-modal.php';
                                            // include 'assets/modals/view-profile-modal.php';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Positions</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addPositionModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($positions->num_rows > 0) {
                                        while ($row = $positions->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['pos_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editPositionModal<?= $row['pos_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-position-modal.php';
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
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Status</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addStatusModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($status->num_rows > 0) {
                                        while ($row = $status->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['status_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editStatusModal<?= $row['status_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-status-modal.php';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold card-title align-self-center">Zone / Purok</h6>
                        <div class="card-tools ml-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-success btn-icon-split shadow-sm" data-toggle="modal" data-target="#addZoneModal">
                                <span class="icon text-white-50 d-none d-sm-inline-block">
                                    <i class="fas fa-database"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped border text-dark table-asc" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($zone->num_rows > 0) {
                                        while ($row = $zone->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?= $row['zone_name'] ?></td>
                                                <td><a href="" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#editZoneModal<?= $row['zone_id'] ?>" data-toggle="tooltip" title="Edit"><i class="bi bi-pencil-square text-gray-900"></i></a></td>
                                            </tr>
                                    <?php
                                            include 'assets/modals/edit-zone-modal.php';
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
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">BACKUP SQL DATABASE</h6>
                    </div>
                    <div class="card-body text-center">
                        <a href="db/backup.php" class="d-none d-sm-inline-block btn btn-success btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-database"></i>
                            </span>
                            <span class="text">Backup SQL Database</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#insertCitizenship').on('submit', function(e) {
            e.preventDefault();
            var insertCitizenship = $('#insertCitizenship').serialize();
            console.log(insertCitizenship)
            swal.fire({
                title: "Continue adding new record of citizenship?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#4e73df',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-citizenship-query.php",
                        data: insertCitizenship,
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('#insertComType').on('submit', function(e) {
            e.preventDefault();
            var insertComType = $('#insertComType').serialize();
            console.log(insertComType)
            swal.fire({
                title: "Continue adding new record of complaint type?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#4e73df',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-complaint-type-query.php",
                        data: insertComType,
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('#insertEvent').on('submit', function(e) {
            e.preventDefault();
            var insertEvent = $('#insertEvent').serialize();
            console.log(insertEvent)
            swal.fire({
                title: "Continue adding new record of event?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#4e73df',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-event-query.php",
                        data: insertEvent,
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('#insertPosition').on('submit', function(e) {
            e.preventDefault();
            var insertPosition = $('#insertPosition').serialize();
            console.log(insertPosition)
            swal.fire({
                title: "Continue adding new record of position?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#4e73df',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-position-query.php",
                        data: insertPosition,
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('#insertStatus').on('submit', function(e) {
            e.preventDefault();
            var insertStatus = $('#insertStatus').serialize();
            console.log(insertStatus)
            swal.fire({
                title: "Continue adding new record of status?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#4e73df',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-status-query.php",
                        data: insertStatus,
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(response);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('#insertZone').on('submit', function(e) {
			e.preventDefault();
			var insertZone = $('#insertZone').serialize();
			console.log(insertZone)
			swal.fire({
				title: "Continue adding new record of status?",
				icon: 'question',
				showCancelButton: !0,
				confirmButtonText: "Yes, continue!",
				confirmButtonColor: '#4e73df',
				cancelButtonText: "No, wait go back!",
				reverseButtons: !0
			}).then(function(e) {
				if (e.value === true) {
					$.ajax({
						type: 'POST',
						url: "config/queries/add-zone-query.php",
						data: insertZone,
						success: function(data) {
							var response = JSON.parse(data);
							console.log(response);
							if (response.success_flag == 0) {
								toastr.error(response.message)
							} else {
								toastr.success(response.message);

								setTimeout(function() {
									window.location.reload();
								}, 2000);
							}
						}
					});
				} else {
					e.dismiss;
				}
			}, function(dismiss) {
				return false;
			})
		})
    })
</script>
<?php
include 'assets/modals/add-citizenship-modal.php';
include 'assets/modals/add-complaint-type-modal.php';
include 'assets/modals/add-event-modal.php';
include 'assets/modals/add-position-modal.php';
include 'assets/modals/add-status-modal.php';
include 'assets/modals/add-zone-modal.php';
include 'layouts/footer.php';
?>