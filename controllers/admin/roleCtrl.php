<?php
include '../../config/db.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : '';
$roles = [];
$role = [];

$db = Db::getInstance();
$message = "";

if($_SERVER["REQUEST_METHOD"] == "GET" && $action == "edit" && !empty($idTarget)){
    $sql = "SELECT * FROM roles WHERE id = '$idTarget'";
    $result = $db->select($sql);
    $role = $result[0];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == "create") {
    $name = isset($_POST["name"]) ? $db->quote($_POST["name"]) : "";
    $display_name = isset($_POST["display_name"]) ? $db->quote($_POST["display_name"]) : "";

    $result = $db->query("INSERT INTO `roles` (`name`, `display_name`) VALUES ($name, $display_name)");

    if (!empty($result)) {
        $message = 'ok';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == "edit") {
    $name = isset($_POST["name"]) ? $db->quote($_POST["name"]) : "";
    $display_name = isset($_POST["display_name"]) ? $db->quote($_POST["display_name"]) : "";

    if (!empty($idTarget)) {

        $result = $db->query("UPDATE `roles` SET `name`= $name, `display_name` = $display_name where `id`=$idTarget");
        if (!empty($result)) {
            $message = 'ok';
        }
    }
} else {
    $sql = "SELECT * FROM roles";
    $roles = $db->select($sql);
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
                include(__DIR__ . '/../../views/admin/role/create.php');
            } else if ($action == "edit") {
                include(__DIR__ . '/../../views/admin/role/edit.php');
            } else {
                include(__DIR__ . '/../../views/admin/role/index.php');
            }
            ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>