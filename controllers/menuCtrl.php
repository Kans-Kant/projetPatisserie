<?php

session_start();
include '../config/db.php';

$db = Db::getInstance();
$reviews = [];
$menu = [];
$idTarget = isset($_GET['idTarget']) ? $_GET['idTarget'] : '';
$message = '';
$error = '';

if (!empty($idTarget)) {
    $sql = "SELECT m.*, c.id as category_id, c.name as category_name FROM menus m, categories c WHERE m.category_id = c.id and m.id = '$idTarget'";
    $result = $db->select($sql);
    $menu = $result[0];

    $sql = "SELECT r.*, u.lastname, u.firstname FROM reviews r, users u WHERE r.user_id = u.id and r.menu_id = '$idTarget'";
    $reviews = $db->select($sql);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $review = isset($_POST["review"]) ? $db->quote($_POST["review"]) : "";
        $rating = isset($_POST["rating"]) ? $db->quote($_POST["rating"]) : "";

        if (isset($_SESSION) && isset($_SESSION['id'])) {
            $user_id = $_SESSION["id"];
            $menu_id = $idTarget;
            $result = $db->query("INSERT INTO `reviews` (`review`, `rating`, `menu_id`, `user_id`) VALUES ($review, $rating, $menu_id, $user_id)");
            if (!empty($result)) {
                $message = 'ok';
            }
        } else {
            $error = 'Vous ètes déconnecté(e)s';
        }
    }
}
?>

<?php
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/menu.php');
include(__DIR__ . '/../views/templates/footer.php');
