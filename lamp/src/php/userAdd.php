<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$id = trim($_POST['userId']);
$password = trim($_POST['userPassword']);
$password = hash('sha512', $password);
$error = null;

if (empty($id) || empty($password)) {
    $error = "Veuillez remplir tous les champs";
}
if ($id>50 || $password>254) {
    $error = "Les champs ne peuvent pas excéder 50 caractères";
}

$nb = rand(0 , 99);
$req = $bdd->query("INSERT INTO user (home, id, password) VALUES ('$id$nb', '$id', '$password')");

if (!$error) {
    $success = "L'utilisateur a été créé";
    header("Location: ../index.php?success=$success");
} else {
    header("Location: ../index.php?error=$error");
}

?>