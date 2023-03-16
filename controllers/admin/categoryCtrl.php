<?php
include '../../config/db.php';

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : '';
$categories = [];
$category = [];
$db = Db::getInstance();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && $action == "edit" && !empty($idTarget)) {
    $sql = "SELECT * FROM categories WHERE id = '$idTarget'";
    $result = $db->select($sql);
    $category = $result[0];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == "create") {
    $name = isset($_POST["name"]) ? $db->quote($_POST["name"]) : "";
    $description = isset($_POST["description"]) ? $db->quote($_POST["description"]) : "";
    $slug = isset($_POST["slug"]) ? $db->quote($_POST["slug"]) : "";
    $parent = isset($_POST["parent"]) ? $db->quote($_POST["parent"]) : null;

    $result = $db->query("INSERT INTO `categories` (`name`, `slug`, `parent_id`, `description`) VALUES ($name, $slug, $parent, $description)");

    if (!empty($result)) {
        $message = 'ok';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == "edit") {
    $name = isset($_POST["name"]) ? $db->quote($_POST["name"]) : "";
    $description = isset($_POST["description"]) ? $db->quote($_POST["description"]) : "";
    $slug = isset($_POST["slug"]) ? $db->quote($_POST["slug"]) : "";
    $parent = isset($_POST["parent"]) ? $db->quote($_POST["parent"]) : null;

    if (!empty($idTarget)) {

        $result = $db->query("UPDATE `categories` SET `name`= $name, `slug` =$slug, `parent_id`= $parent, `description` =  $description where `id`=$idTarget");
        if (!empty($result)) {
            $message = 'ok';
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "delete") {

    $idTarget = isset($_POST['category_id']) ? $_POST['category_id'] : "";

    $result = $db->query("DELETE  FROM `categories` where id=$idTarget");
    $message = "Categorie suppriméé";
} else {
    $sql = "SELECT * FROM categories";
    $categories = $db->select($sql);
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
                include(__DIR__ . '/../../views/admin/category/create.php');
            } else if ($action == "edit") {
                include(__DIR__ . '/../../views/admin/category/edit.php');
            } else {
                include(__DIR__ . '/../../views/admin/category/index.php');
            }
            ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>