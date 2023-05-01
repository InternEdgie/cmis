<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$id = $_GET['id'];

$row = $connection->query("SELECT * FROM tbl_file_complaint fc, tbl_complaint_type ct, tbl_status s, tbl_residents r, tbl_zone z WHERE fc.fc_id = '$id' AND fc.com_id = ct.com_id AND fc.status_id = s.status_id AND fc.resp_id = r.res_id AND r.zone_id = z.zone_id")->fetch_assoc();

$resp_fullname = $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'];
$resp_address = $row['zone_name'] . ', ' . "Macabalan<br>Cagayan de Oro City<br>Misamis Oriental, 9000";
if ($row['fc_type'] == 0) {
    $comp = $connection->query("SELECT * FROM tbl_residents r, tbl_zone z WHERE r.res_id =  '{$row["comp_id"]}' AND r.zone_id = z.zone_id")->fetch_assoc();
    $comp_fullname = $comp['res_lname'] . ', ' . $comp['res_fname'] . ' ' . $comp['res_mname'];
    $comp_address = $comp['zone_name'] . ', ' . "Macabalan<br>Cagayan de Oro City<br>Misamis Oriental, 9000";
} else {
    $comp = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id =  '{$row["comp_id"]}'")->fetch_assoc();
    $comp_fullname = $comp['nres_lname'] . ', ' . $comp['nres_fname'] . ' ' . $comp['nres_mname'];
    $comp_address = $comp['nres_zone'] . ', ' .  $comp['nres_barangay'] . '<br>' . $comp['nres_city'] . '<br>' . $comp['nres_province'] . ', ' .  $comp['nres_zcode'];
}

$schedules = $connection->query("SELECT * FROM tbl_schedules WHERE fc_id = '$id'");
if ($schedules->num_rows == 3) {
    $lupon = $connection->query("SELECT * FROM tbl_lupon l, tbl_selected_lupon sl WHERE sl.fc_id = '$id' AND l.lupon_id = sl.lupon_id");
}
// $com_id = $row['com_id'];
// $status_id = $row['status_id'];
// $com = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$com_id'")->fetch_assoc();
// $status = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$status_id'")->fetch_assoc();

?>
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-item"><a href="file-complaint.php">File Complaints</a></div>
            <div class="breadcrumb-item active">Complaint Viewing</div>
            <button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print">
                <span class="icon">
                    <i class="bi bi-printer"></i>
                </span>
                <span class="text">Print</span>
            </button>
            <a href="#" id="edit" class="ml-3 btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm" data-toggle="modal" data-target="#editResidentModal">
                <span class="icon">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <span class="text">Edit</span>
            </a>
            <a href="#" id="cancel" class="ml-3 btn btn-sm text-gray-900 btn-warning btn-icon-split shadow-sm d-none" data-toggle="modal" data-target="#editResidentModal">
                <span class="icon">
                    <i class="bi bi-x-circle-fill"></i>
                </span>
                <span class="text">Cancel</span>
            </a>
        </div>
        <?php include 'config/message.php'; ?>
        <div id="printThis">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold card-title">COMPLAINT INFORMATION</h6>
                </div>
                <div class="card-body">
                    <dl>
                        <div class="row">
                            <div class="col-md-4">
                                <dt>ENTRY NO.</dt>
                                <dd><?= $row['fc_id'] ?></dd>
                            </div>
                            <div class="col-md-4">
                                <dt>NATURE OF THE CASE</dt>
                                <dd><?= $row['com_name'] ?></dd>
                            </div>
                            <div class="col-md-4">
                                <dt>DATE & TIME FILED</dt>
                                <dd><?= date('F d, Y - h:i A', strtotime($row['fc_regdatetime'])) ?></dd>
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
                            <div class="col-md-4">
                                <dt>CURRENT STATUS</dt>
                                <dd><?= $row['status_name'] ?></dd>
                            </div>
                        </div>
                        <dt>REASON OF COMPLAINT</dt>
                        <dd class="statement"><?= $row['fc_statement'] ?></dd>
                        <dd class="edit-statement d-none">
                            <form id="updateStatement" method="POST">
                                <textarea class="form-control" name="fc_statement" id="fc_statement" rows="3"><?= $row['fc_statement'] ?></textarea>
                                <div class="text-right mt-3">
                                    <input type="submit" class="btn btn-sm btn-warning" style="color:black" value="Submit">
                                </div>
                            </form>
                        </dd>
                    </dl>
                </div>
            </div>
            <?php if ($schedules->num_rows == 3) : ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold card-title">LUPON SELECTED</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                </tr>
                                <?php while ($row = $schedules->fetch_assoc()) : ?>
                                    <tr>
                                        <th>$row['']</th>
                                        <th></th>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- <div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold card-title">COMPLAINT FILED HISTORY AS COMPLAINANT</h6>
				</div>
				<div class="card-body">
					<?php if ($complainant->num_rows > 0) : ?>
						<div class="table-responsive">
							<table class="table table-striped text-gray-900 border" width="100%">
								<tr>
									<th>Entry No.</th>
									<th>Respondent</th>
									<th>Case Filed</th>
									<th>Status</th>
									<th>Date Filed</th>
								</tr>
								<?php
                                while ($rowc = $complainant->fetch_assoc()) {
                                    $resp_id = $rowc['resp_id'];
                                    $resp1 = $connection->query("SELECT * FROM tbl_residents WHERE res_id = '$resp_id'")->fetch_assoc();
                                    $rp_fullname = $resp1['res_fname'] . ' ' . $resp1['res_mname'] . ' ' . $resp1['res_lname'];
                                ?>
									<tr>
										<td><?= $rowc['fc_id'] ?></td>
										<td><?= $rp_fullname ?></td>
										<td>
											<?php
                                            $com_id = $rowc['com_id'];
                                            $complaint = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$com_id'")->fetch_assoc();
                                            echo $complaint['com_name'];
                                            ?>
										</td>
										<td>
											<?php
                                            $status_id = $rowc['status_id'];
                                            $status = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$status_id'")->fetch_assoc();
                                            if (!empty($status['status_name'])) {
                                                echo $status['status_name'];
                                            } else {
                                                echo "---";
                                            }
                                            ?>
										</td>
										<td><?= date('F d, Y', strtotime($rowc['fc_regdatetime'])) ?></td>
									</tr>
									<?php
                                }
                                    ?>
							</table>
						</div>
					<?php else : ?>
						<h6 class="text-center font-italic text-gray-500">No data available</h6>
					<?php endif; ?>
				</div>
			</div> -->
        </div>
    </div>
</div>
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
            $('.edit-statement').removeClass('d-none')
            $('.statement').addClass('d-none')
        })
        $('#cancel').click(function() {
            $('#cancel').addClass('d-none')
            $('#print').removeAttr('disabled')
            $('#edit').removeClass('d-none')
            $('.edit-statement').addClass('d-none')
            $('.statement').removeClass('d-none')
        })
        $('#updateStatement').on('submit', function(e) {
            e.preventDefault();
            var fc_statement = $('#fc_statement').val();
            swal.fire({
                title: "Are you sure you want to update your password?",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#dc3545',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                // if (e.value === true) {
                //     $.ajax({
                //         type: 'POST',
                //         url: "{{ url('updatePassword') }}",
                //         data: updatePassword,
                //         dataType: "json",
                //         success: function(response) {
                //             if (response.success_flag == 0) {
                //                 toastr.error(response.message)
                //             } else {
                //                 toastr.success(response.message);

                //                 setTimeout(function() {
                //                     window.location.reload();
                //                 }, 2000);
                //             }
                //         }
                //     });
                // } else {
                //     e.dismiss;
                // }
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
            _p.find('.card-header').removeClass('card-header')
            _p.find('.card-body').removeClass('card-body')
            _p.find('h6.card-title').addClass('text-center h5')
            _el.append(_h)
            _el.append(_ph)
            _el.find('title').text('Resident Profile')
            _el.append(_p)

            var nw = window.open('', '_blank', 'width=1000,height=900,top=50,left=200')
            nw.document.write(_el.html())
            nw.document.close()

            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    // end_loader()
                    // $('.table').dataTable({
                    // 	columnDefs: [
                    // 	{ orderable: false, targets: 5 }
                    // 	],
                    // });
                }, 300);
            }, (750));
        });
    });
    // toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
</script>