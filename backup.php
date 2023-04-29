<?php
include 'config/admin-middleware.php';
include 'layouts/header.php';
include 'config/connection.php';
?>

<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BACKUP</h1>
        </div>
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

<?php
include 'layouts/footer.php';
?>