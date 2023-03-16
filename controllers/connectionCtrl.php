
<?php
// Initialize the session
session_start();
include '../config/db.php';
include '../config/config.php';

$db = Db::getInstance();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  if (isset($_SESSION["role"]) && $_SESSION["role"]) {
    header("location: admin/accountCtrl.php");
  } else {
    header("location: user/accountCtrl.php");
  }
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //===================== email : Nettoyage et validation =======================
  $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

  if (empty($email)) {
    $error["email"] = "L'adresse mail est obligatoire!!";
  } else {
    $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$testEmail) {
      $error["email"] = "L'adresse email n'est pas au bon format!!";
    }
  }

  //===================== filePicture : Nettoyage et validation =======================
  $password = filter_input(INPUT_POST, 'password');

  $sql = "SELECT id, email, role_id, password FROM users WHERE email = '$email'";
  $result = $db->select($sql);

  if (!empty($result[0])) {
    if (password_verify($password, $result[0]["password"])) {

      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $result[0]["id"];
      $_SESSION["email"] = $result[0]["email"];
      $_SESSION["role"] = $result[0]["role_id"];
      if ($result[0]['role_id'] == 1) {
        header("location: admin/accountCtrl.php");
      } else {
        header("location: user/accountCtrl.php");
      }
      exit;
    } else {
      // Password is not valid, display a generic error message
      $login_err = "Invalid username or password.";
    }
  } else {
    $login_err = "Invalid username or password.";
  }
} else {
  include(__DIR__ . '/../views/templates/header.php');
  include(__DIR__ . '/../views/connection.php');
  include(__DIR__ . '/../views/templates/footer.php');
}


// Rendu des vues concernées

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
} else {
  include(__DIR__ . '/../views/formDisplay.php');
}
