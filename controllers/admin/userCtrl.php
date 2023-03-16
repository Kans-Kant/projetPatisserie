<?php
include '../../config/db.php';

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

$db = Db::getInstance();

$action = isset($_GET['action']) ? $_GET['action'] : "";
$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : "";
$users = [];
$user = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && $action == "edit" && !empty($idTarget)) {
    $sql = "SELECT * FROM users WHERE id = '$idTarget'";
    $result = $db->select($sql);
    $user = $result[0];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $db->quote($_POST["email"]) : "";
    $lastname = isset($_POST["lastname"]) ? $db->quote($_POST["lastname"]) : "";
    $firstname = isset($_POST["firstname"]) ? $db->quote($_POST["firstname"]) : "";
    $role = isset($_POST["role"]) ? $db->quote($_POST["role"]) : null;
    $password = isset($_POST["password"]) ? $db->quote($_POST["password"]) : "";
    $phone = isset($_POST["phone"]) ? $db->quote($_POST["phone"]) : null;

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($action == "create") {

        $result = $db->query("INSERT INTO `users` (`email`, `lastname`, `firstname`, `phone`, `password`, `role_id`) VALUES ($email, $lastname, $firstname, $phone, '$passwordHash', $role)");

        if (!empty($result)) {
            $message = 'ok';
        }
    } else if ($action == "edit") {

        if (!empty($idTarget)) {

            $result = $db->query("UPDATE `users` SET `email`= $email, `lastname` =$lastname, `firstname`= $firstname, `phone` =  $phone, `password` =  '$passwordHash', `role_id` =  $role where `id`=$idTarget");

            if (!empty($result)) {
                $message = 'ok';
            }
        }
    } else if (isset($_POST['action']) && $_POST['action'] == "delete") {

        $idTarget = isset($_POST['user_id']) ? $_POST['user_id'] : "";

        $result = $db->query("DELETE  FROM `users` where id=$idTarget");
        $message = "utilisateurs supprimé";
    }
} else {
    $sql = "SELECT * FROM users";
    $users = $db->select($sql);
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
                include(__DIR__ . '/../../views/admin/user/create.php');
            } else if ($action == "edit") {
                include(__DIR__ . '/../../views/admin/user/edit.php');
            } else {
                include(__DIR__ . '/../../views/admin/user/index.php');
            }
            ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>