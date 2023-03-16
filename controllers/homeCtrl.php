<?php
include '../config/db.php';

$db = Db::getInstance();

$categories = [];

$sql = "SELECT name, id, id FROM categories";
$categories = $db->select($sql);

$groupedCatMenus = [];
foreach ($categories as $category) {
    $sql = "SELECT * FROM menus where category_id =" . $category['id'] . " limit 6";
    $menus = $db->select($sql);
    $groupedCatMenus[$category['id']] = $menus;
}

?>
<?php
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/home.php');
include(__DIR__ . '/../views/templates/footer.php');
