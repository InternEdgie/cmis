<?php
include 'config/user-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';

$id = $_GET['id'];

$row = $connection->query("SELECT * FROM tbl_invitation inv, tbl_complaint_type ct, tbl_residents r, tbl_zone z WHERE inv.inv_id = '$id' AND inv.resp_id = r.res_id AND r.zone_id = z.zone_id")->fetch_assoc();

$resp_fullname = $row['res_lname'] . ', ' . $row['res_fname'] . ' ' . $row['res_mname'];
$resp_address = $row['zone_name'] . ', ' . "Macabalan";
if ($row['inv_type'] == 0) {
    $comp = $connection->query("SELECT * FROM tbl_residents r, tbl_zone z WHERE r.res_id =  '{$row["comp_id"]}' AND r.zone_id = z.zone_id")->fetch_assoc();
    $comp_fullname = $comp['res_lname'] . ', ' . $comp['res_fname'] . ' ' . $comp['res_mname'];
    $comp_address = $comp['zone_name'] . ', ' . "Macabalan, Cagayan de Oro City";
} else {
    $comp = $connection->query("SELECT * FROM tbl_non_residents WHERE nres_id =  '{$row["comp_id"]}'")->fetch_assoc();
    $comp_fullname = $comp['nres_lname'] . ', ' . $comp['nres_fname'] . ' ' . $comp['nres_mname'];
    $comp_address = $comp['nres_zone'] . ', ' .  $comp['nres_barangay'] . ', ' . $comp['nres_city'];
}

$check_sched = $connection->query("SELECT * FROM tbl_schedules WHERE fc_id = '{$row['inv_id']}' AND sched_type = 1")->fetch_assoc();
$complaint_type = $connection->query("SELECT * FROM tbl_complaint_type ORDER BY com_name ASC");
$date = date('F d, Y', strtotime($check_sched['start_date']));
$lupon = $connection->query("SELECT * FROM tbl_lupon l, tbl_residents r, tbl_positions p WHERE p.pos_name = 'Chairman' AND p.pos_id = l.pos_id AND l.res_id = r.res_id")->fetch_assoc();
$lupon_pos = $lupon['pos_name'];
$lupon_name = $lupon['res_fname'] . ' ' . substr($lupon['res_mname'], 0, 1) . '. ' . $lupon['res_lname'];
// $com_id = $row['com_id'];
// $status_id = $row['status_id'];
// $com = $connection->query("SELECT * FROM tbl_complaint_type WHERE com_id = '$com_id'")->fetch_assoc();
// $status = $connection->query("SELECT * FROM tbl_status WHERE status_id = '$status_id'")->fetch_assoc();
?>
<style type="text/css">
    table h6 {
        font-size: 0.2in;
    }

    table h5 {
        font-size: 0.2in;
    }

    table h4 {
        font-size: 0.2in;
    }

    table p {
        font-size: 0.2in;
    }

    .main-paragraph p {
        font-size: 0.2in !important;
    }

    .foot p {
        font-size: 0.2in;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="invitation.php">Invitation</a></li>
                    <li class="breadcrumb-item active">Generate Invitation</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6 align-self-center text-right">
                <button href="#" class="ml-auto btn btn-sm btn-primary btn-icon-split shadow-sm" id="print" onclick="printDiv('printThis')">
                    <span class="icon">
                        <i class="bi bi-printer"></i>
                    </span>
                    <span class="text">Print</span>
                </button>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content pb-5" id="printThis">
    <div class="container-fluid">
        <div class="card mb-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold card-title title">INVITATION INFORMATION</h6>
            </div> -->
            <div class="card-body m-5">
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
                <h1 class="text-center fw-bold" style="margin-bottom: 5%">LETTER OF INVITATION</h1>
                <table style="width:100%">
                    <tr>
                        <th style="width:5%">
                            <p>To:</p>
                        </th>
                        <td style="width: 30%">
                            <p class="border-bottom border-dark"><?= $resp_fullname ?></p>
                        </td>
                        <td style="width: 45%"></td>
                        <td class="text-center">
                            <p class="border-bottom border-dark"><?= $date ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p class="border-bottom border-dark"><?= $resp_address ?></p>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <p>Cagayan de Oro City</p>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div class="main-paragraph" style="margin-top: 3%">
                    <p style="text-indent: 10%; text-align: justify;" class="mb-3">You are invited to come to my office at the Barangay Hall at <span class="fw-bold border-bottom border-dark">2:00 PM</span> on <span class="fw-bold border-bottom border-dark"><?= $date ?></span> for clarification/dialogue, in my presence, between you and <span class="fw-bold border-bottom border-dark"><?= $comp_fullname ?></span> of <span class="fw-bold border-bottom border-dark"><?= $comp_address ?></span>.</p>
                    <p style="text-indent: 10%">Your presence is highly expected.</p>
                </div>
                <div class="foot" style="margin-top: 5%">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col text-center">
                            <p class="border-bottom border-dark text-uppercase"><?= $lupon_name ?></p>
                            <p class="text-uppercase fw-bold"><?= $lupon_pos ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;

        setTimeout(function() {

            window.print();

            document.body.innerHTML = originalContents;

        }, 1000);


    }
</script>
<?php
include 'assets/modals/add-complaint-type-modal.php';
include 'assets/modals/proceed-to-summon-modal.php';
include 'layouts/footer.php';
?>