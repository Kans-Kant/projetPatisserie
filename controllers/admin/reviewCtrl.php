<?php

include '../../config/db.php';
session_start();


if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
$reviews = [];
$db = Db::getInstance();

$sql = "SELECT * FROM reviews";
$reviews = $db->select($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "delete") {

    $idTarget = isset($_POST['review_id']) ? $_POST['review_id'] : "";

    $result = $db->query("DELETE  FROM `reviews` where id=$idTarget");
    $message = "commentaire supprimé";
}

include(__DIR__ . '/../../views/templates/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include(__DIR__ . '/../../views/templates/account.php'); ?>
        </div>
        <div class="col-md-9">
            <?php
            if ($action == "create") {
                include(__DIR__ . '/../../views/admin/review/create.php');
            } else if ($action == "edit") {
                include(__DIR__ . '/../../views/admin/review/edit.php');
            } else {
                include(__DIR__ . '/../../views/admin/review/index.php');
            }
            ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>