<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$id = $_GET['id'];

$row = $connection->query("SELECT * FROM tbl_invitation inv, tbl_complaint_type ct, tbl_residents r, tbl_zone z WHERE inv.inv_id = '$id' AND inv.resp_id = r.res_id AND r.zone_id = z.zone_id")->fetch_assoc();

$resp_fullname = $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'];
$resp_address = $row['zone_name'] . ', ' . "Macabalan<br>Cagayan de Oro City<br>Misamis Oriental, 9000";
if ($row['inv_type'] == 0) {
    $comp = $connection->query("SELECT * FROM tbl_residents r, tbl_zone z WHERE r.res_id =  '{$row["comp_id"]}' AND r.zone_id = z.zone_id")->fetch_assoc();
    $comp_fullname = $comp['res_lname'] . ', ' . $comp['res_fname'] . ' ' . $comp['res_mname'];
    $comp_address = $comp['zone_name'] . ', ' . "Macabalan<br>Cagayan de Oro City<br>Misamis Oriental, 9000";
} else {
    $comp = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id =  '{$row["comp_id"]}'")->fetch_assoc();
    $comp_fullname = $comp['nres_lname'] . ', ' . $comp['nres_fname'] . ' ' . $comp['nres_mname'];
    $comp_address = $comp['nres_zone'] . ', ' .  $comp['nres_barangay'] . '<br>' . $comp['nres_city'] . '<br>' . $comp['nres_province'] . ', ' .  $comp['nres_zcode'];
}

$check_sched = $connection->query("SELECT * FROM tbl_schedules WHERE fc_id = '{$row['inv_id']}' AND sched_type = 1")->fetch_assoc();
$complaint_type = $connection->query("SELECT * FROM tbl_complaint_type ORDER BY com_name ASC");
// $com_id = $row['com_id'];
// $status_id = $row['status_id'];
// $com = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$com_id'")->fetch_assoc();
// $status = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$status_id'")->fetch_assoc();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="invitation.php">Invitation</a></li>
                    <li class="breadcrumb-item active">Invitation Viewing</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6 align-self-center text-right">
                <a href="generate-invitation.php?id=<?= $row['inv_id'] ?>" class="ml-auto btn btn-sm btn-info btn-icon-split shadow-sm">
                    <span class="icon">
                        <i class="bi bi-printer"></i>
                    </span>
                    <span class="text">Print Invitation</span>
                </a>
                <button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print">
                    <span class="icon">
                        <i class="bi bi-printer"></i>
                    </span>
                    <span class="text">Print</span>
                </button>
                <a href="#" id="edit" class="ml-auto btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm <?= $check_sched['start_date'] <= date('Y-m-d') && $row['inv_status'] != 3 ? '' : 'disabled' ?>" data-toggle="modal" data-target="#editResidentModal">
                    <span class="icon">
                        <i class="bi bi-pencil-square"></i>
                    </span>
                    <span class="text">Edit Status</span>
                </a>
                <a href="#" id="cancel" class="ml-auto btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm d-none" data-toggle="modal" data-target="#editResidentModal">
                    <span class="icon">
                        <i class="bi bi-x-circle-fill"></i>
                    </span>
                    <span class="text">Cancel</span>
                </a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content pb-5" id="printThis">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold card-title title">INVITATION INFORMATION</h6>
            </div>
            <div class="card-body">
                <input type="hidden" id="current_status" value="<?= $row['inv_status'] ?>">
                <dl>
                    <div class="row">
                        <div class="col-md-4">
                            <dt>INVITATION NO.</dt>
                            <dd id="inv_id"><?= $row['inv_id'] ?></dd>
                        </div>
                        <div class="col-md-4">
                            <dt>DATE & TIME FILED</dt>
                            <dd><?= date('F d, Y - h:i A', strtotime($row['inv_regdatetime'])) ?></dd>
                        </div>
                        <div class="col-md-4">
                            <dt>CURRENT STATUS</dt>
                            <dd class="update-status">
                                <?php
                                $inv_status = $row['inv_status'];
                                if ($inv_status == 0) {
                                    echo "Ongoing";
                                } else if ($inv_status == 1) {
                                    echo "Settled";
                                } else if ($inv_status == 2) {
                                    echo "Withdrawn";
                                } else if ($inv_status == 3) {
                                    echo "Summon";
                                } else {
                                    echo "---";
                                }
                                ?>
                            </dd>
                            <div class="input-group mb-3 show-select-status d-none">
                                <select class="form-select" id="status" name="inv_status">
                                    <option value="0" <?= $inv_status == 0 ? 'selected disabled' : '' ?>>Ongoing</option>
                                    <option value="1" <?= $inv_status == 1 ? 'selected disabled' : '' ?>>Settled</option>
                                    <option value="2" <?= $inv_status == 2 ? 'selected disabled' : '' ?>>Withdrawn</option>
                                    <option value="3" <?= $inv_status == 3 ? 'selected disabled' : '' ?>>Proceed to Summon</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <dt>COMPLAINANT</dt>
                            <dd><?= "<strong>" . $comp_fullname . "</strong><br>" . $comp_address ?></dd>
                        </div>
                        <div class="col-md-4">
                            <dt>RESPONDENT</dt>
                            <dd><?= "<strong>" . $resp_fullname . '</strong><br>' . $resp_address ?></dd>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</section>
<?php ?>
<noscript id="print-header">
    <div class="justify-content-center">
        <table class="w-100 mb-5">
            <tr>
                <td rowspan="6" style="width:10%"><img src="assets/img/logo.png" width="100" class="img-fluid" /></td>
                <td style="width:80%">
                    <h6 class="mb-0 h6 text-center">Republic of the Philippines</h6>
                </td>
                <td rowspan="6" style="width:10%"></td>
            </tr>
            <tr>
                <td>
                    <h6 class="mb-0 text-center">Province of Misamis Oriental</h6>
                </td>

            </tr>
            <tr>
                <td>
                    <h6 class="mb-0 text-center">City of Cagayan de Oro</h6>
                </td>

            </tr>
            <tr>
                <td>
                    <h6 class="mb-0 h6 font-weight-bold text-center">OFFICE OF LUPONG TAGAPAMAYAPA</h6>
                </td>

            </tr>
            <tr>
                <td>
                    <h5 class="fw-bold mb-0 font-weight-bold text-center">BARANGAY MACABALAN</h5>
                </td>

            </tr>
            <tr>
                <td class="text-center font-italic">
                    <h7>Tel No. 881-2209</h7>
                </td>
            </tr>
        </table>
    </div>
</noscript>
<script>
    $(document).ready(function() {
        $('#edit').click(function() {
            $('#print').attr('disabled', '')
            $('#cancel').removeClass('d-none')
            $('#edit').addClass('d-none')
            $('.update-status').addClass('d-none')
            $('.show-select-status').removeClass('d-none')
        })
        $('#cancel').click(function() {
            $('#cancel').addClass('d-none')
            $('#print').removeAttr('disabled')
            $('#edit').removeClass('d-none')
            $('.update-status').removeClass('d-none')
            $('.show-select-status').addClass('d-none')
        })
        $('#proceedToSummon').on('submit', function(e) {
            e.preventDefault();
            var proceedToSummon = $('#proceedToSummon').serialize();
            console.log(proceedToSummon)
            swal.fire({
                title: "Continue filing this complaint?",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#f6c23e',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/add-complaint-query.php",
                        data: proceedToSummon,
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
        $('#print').click(function() {
            // start_loader();
            var _h = $('head').clone()
            var _p = $('#printThis').clone()
            var _ph = $($('noscript#print-header').html()).clone()
            var _el = $('<div>')
            _p.find('.card').removeClass('shadow card')
            _p.find('.card-title').removeClass('card-title')
            _p.find('.card-header').removeClass('card-header')
            _p.find('.card-body').removeClass('card-body')
            _p.find('h6.title').addClass('text-center h5')
            _el.append(_h)
            _el.append(_ph)
            _el.find('title').text('Complaint Information')
            _el.append(_p)

            var nw = window.open('', '_blank', 'width=1000,height=900,top=50,left=200')
            nw.document.write(_el.html())
            nw.document.close()

            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                    // $('.table').dataTable({
                    // 	columnDefs: [
                    // 	{ orderable: false, targets: 5 }
                    // 	],
                    // });
                }, 250);
            }, (750));
        });
        $('#status').on('change', function(e) {
            e.preventDefault()
            var id = $('#inv_id').text()
            var current_status = $('#current_status').val()
            var status = $(this).val()
            var status_name

            if (status == 0) {
                status_name = "Ongoing";
            } else if (status == 1) {
                status_name = "Settled";
            } else if (status == 2) {
                status_name = "Withdrawn";
            } else if (status == 3) {
                swal.fire({
                    title: "Proceed to Summon?",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "Yes, continue!",
                    confirmButtonColor: '#dc3545',
                    cancelButtonText: "No, wait go back!",
                    reverseButtons: !0
                }).then(function(e) {
                    if (e.value === true) {
                        // $.ajax({
                        //     type: 'POST',
                        //     url: "config/queries/edit-invitation-status-query.php",
                        //     data: {
                        //         'status': status,
                        //         'inv_id': id
                        //     },
                        //     success: function(data) {
                        //         var response = JSON.parse(data);
                        //         console.log(data);
                        //         if (response.success_flag == 0) {
                        //             toastr.error(response.message)
                        //         } else {
                        //             toastr.success(response.message);

                        //             setTimeout(function() {
                        //                 window.location.reload();
                        //             }, 2000);
                        //         }
                        //     }
                        // });
                        $('#proceedToSummonModal').modal('show')


                    } else {
                        e.dismiss;
                        $('#status').val(current_status)
                    }
                }, function(dismiss) {
                    return false;
                })
            }

            if (status == 0 || status == 1 || status == 2) {
                swal.fire({
                    title: "Change status to " + status_name + "?",
                    icon: 'question',
                    showCancelButton: !0,
                    confirmButtonText: "Yes, continue!",
                    confirmButtonColor: '#007bff',
                    cancelButtonText: "No, wait go back!",
                    reverseButtons: !0
                }).then(function(e) {
                    if (e.value === true) {
                        $.ajax({
                            type: 'POST',
                            url: "config/queries/edit-invitation-status-query.php",
                            data: {
                                'status': status,
                                'inv_id': id
                            },
                            success: function(data) {
                                var response = JSON.parse(data);
                                console.log(data);
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
                        $('#status').val(current_status)
                    }
                }, function(dismiss) {
                    return false;
                })
            }

        })
        $('#proceedToSummonModal').on('hide.bs.modal', function() {
            var current_status = $('#current_status').val()
            $('#status').val(current_status)
        })
        $('.add-complaint-type').on('click', function(e) {
            e.preventDefault()
            $('#addComplaintTypeModal').modal('show')
            $('#proceedToSummonModal').modal('hide')
        })
        $('#addComplaintTypeModal').on('hide.bs.modal', function() {
            $('#proceedToSummonModal').modal('show')
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

                                var selectElement = $('.com_id');
                                var newOption = new Option(response.com_name, response.com_id, true, true);
                                selectElement.append(newOption).trigger('change');

                                setTimeout(function() {
                                    $('#proceedToSummonModal').modal('show')
                                    $('#addComplaintTypeModal').modal('hide')
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
    });

    // toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
</script>
<?php
include 'assets/modals/add-complaint-type-modal.php';
include 'assets/modals/proceed-to-summon-modal.php';
include 'layouts/footer.php';
?>