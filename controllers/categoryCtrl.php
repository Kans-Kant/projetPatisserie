<?php
session_start();
include '../config/db.php';

$db = Db::getInstance();
$categoryMenus = [];
$category = [];

$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : '';

if (!empty($idTarget)) {
    $sql = "SELECT * FROM menus WHERE category_id = '$idTarget'";
    $categoryMenus = $db->select($sql);

    $sql = "SELECT `name` FROM categories WHERE id = '$idTarget'";
    $result = $db->select($sql);
    $categorie = $result[0];
}
?>

<?php
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/category.php');
include(__DIR__ . '/../views/templates/footer.php');
