<?php

include '../config/db.php';
include '../config/config.php';

$db = Db::getInstance();

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

    //===================== password : Nettoyage et validation =======================
    $password = filter_input(INPUT_POST, 'password');
    $passwordCheck = filter_input(INPUT_POST, 'passwordCheck');
    if ($password != $passwordCheck) {
        $error["password"] = "Les mots de passe ne correspondent pas";
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $firstname = $db->quote($_POST['firstname']);
    $phone = $db->quote($_POST['phone']);

    //===================== Lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($lastname)) {
        $error["lastname"] = "Vous devez entrer un nom!!";
    } else { // Pour les champs obligatoires, on retourne une erreur
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$isOk) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    }
    //===================== Lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($lastname)) {
        $error["lastname"] = "Vous devez entrer un nom!!";
    }

    $existUser = $db->select("SELECT * FROM `users` where email = '$email' ");
    
    if (empty($existUser)) {
        $result = $db->query("INSERT INTO `users` (`email`, `password`, `lastname`, `firstname`, `phone`) VALUES ('$email', '$passwordHash', '$lastname', $firstname, $phone)");

        if(!empty($result)){
            return 'ok';
        }
    }

} else {

    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/registration.php');
    include(__DIR__ . '/../views/templates/footer.php');
}
