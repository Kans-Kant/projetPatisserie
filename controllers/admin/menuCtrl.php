<?php
include '../../config/db.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /controllers/connectionCtrl.php');
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : '';
$menus = [];
$menu = [];
$categories = [];
$db = Db::getInstance();
$message = "";

$sql = "SELECT * FROM categories";
$categories = $db->select($sql);

if ($_SERVER["REQUEST_METHOD"] == "GET" && $action == "edit" && !empty($idTarget)) {
    $sql = "SELECT * FROM menus WHERE id = '$idTarget'";
    $result = $db->select($sql);
    $menu = $result[0];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $db->quote($_POST["name"]) : "";
    $slug = isset($_POST["slug"]) ? $db->quote($_POST["slug"]) : "";
    $description = isset($_POST["description"]) ? $db->quote($_POST["description"]) : "";
    $price = isset($_POST["price"]) ? $db->quote($_POST["price"]) : null;
    $category = isset($_POST["category"]) ? $db->quote($_POST["category"]) : "";
    $cover_img = isset($_POST["cover_img"]) ? $db->quote($_POST["cover_img"]) : null;

    if ($action == "create") {

        $result = $db->query("INSERT INTO `menus` (`name`, `slug`, `description`, `price`, `category_id`, `cover_img`) VALUES ($name, $slug, $description, $price, $category, $cover_img)");

        if (!empty($result)) {
            $message = 'ok';
        }
    } else if ($action == "edit") {

        if (!empty($idTarget)) {

            $result = $db->query("UPDATE `menus` SET `name`= $name, `slug` =$slug, `description`= $description, `price` =  $price, `category_id` =  $category, `cover_img` =  $cover_img where `id`=$idTarget");

            if (!empty($result)) {
                echo($result);
                $message = 'Menu modifié avec succès';
            }
        }
    } else if (isset($_POST['action']) && $_POST['action'] == "delete") {

        $idTarget = isset($_POST['menu_id']) ? $_POST['menu_id'] : "";

        $result = $db->query("DELETE  FROM `menus` where id=$idTarget");
        $message = "menu supprimé";
    }
} else {
    $sql = "SELECT * FROM menus";
    $menus = $db->select($sql);
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
                include(__DIR__ . '/../../views/admin/menu/create.php');
            } else if ($action == "edit") {
                include(__DIR__ . '/../../views/admin/menu/edit.php');
            } else {
                include(__DIR__ . '/../../views/admin/menu/index.php');
            }
            ?>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../views/templates/footer.php'); ?>