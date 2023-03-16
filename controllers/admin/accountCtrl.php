<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

include(__DIR__ . '/../../views/templates/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include(__DIR__ . '/../../views/templates/account.php'); ?>
        </div>
        <div class="col-md-9">
            <?php include(__DIR__ . '/../../views/admin/account.php'); ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>  