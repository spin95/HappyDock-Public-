<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$id = trim($_POST['id']);
$password = trim($_POST['password']);
$password = hash('sha512', $password);
$error = null;

if (empty($id) || empty($password)) {
    $error = "Veuillez remplir tous les champs";
}
if ($id>50 || $password>255) {
    $error = "Les champs ne peuvent pas excéder 50 caractères";
}

$userExist = $bdd->query("SELECT * FROM user WHERE id='$id'");

$exist = 0;
foreach ($userExist as $user) {
    $exist = 1;
    $password2 = $user['password'];
    $home = $user['home'];
    if ($password == $password2) {
        $success = "Bonjour";
        header("Location: ../page/dashboard.php?home=$home&success=$success");
    } else {
        $error = "Mauvais identifiant ou mot de passe";
        header("Location: ../index.php?error=$error");
    }
}
if ($exist == 0) {
    $error = "Mauvais identifiant ou mot de passe";
    header("Location: ../index.php?error=$error");
}

?>