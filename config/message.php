<?php
if (!empty($_SESSION['message_success'])) {
	?>
	<div class="alert alert-dismissible bg-white rounded-0 border-left-success shadow-sm border border-5" role="alert">
        <strong><i class="fas fa-check-circle mr-2 text-success"></i>Notice:</strong>
        <?= $_SESSION['message_success'] ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
	<?php
	unset($_SESSION['message_success']);
}

if (!empty($_SESSION['message_warning'])) {
	?>
    <div class="alert alert-dismissible bg-white rounded-0 border-left-warning shadow-sm border border-5" role="alert">
    	<strong><i class="fas fa-exclamation-circle mr-2 text-warning"></i>Notice:</strong>
    	<?= $_SESSION['message_warning'] ?>
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
	<?php
	unset($_SESSION['message_warning']);
}

if (!empty($_SESSION['message_failed'])) {
	?>
    <div class="alert alert-dismissible bg-white rounded-0 border-left-danger shadow-sm border border-5" role="alert">
    	<strong><i class="fas fa-times-circle mr-2 text-danger"></i>Notice:</strong>
        <?= $_SESSION['message_failed'] ?>
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
	<?php
	unset($_SESSION['message_failed']);
}
?>