<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$oldId = trim($_POST['oldId']);
$id2 = trim($_POST['id2']);
$password = hash('sha512', $password);
$error = null;
if (!$id2) {
    $id2 = $oldId;
}

if (empty($oldId) || empty($password)) {
    $error = "Veuillez remplir tous les champs";
}
if ($oldId>50 || $password>254) {
    $error = "Les champs ne peuvent pas excéder 50 caractères";
}

$req = $bdd->query("UPDATE user SET id='$id2', password='$password' WHERE id='$id' ");

if (!$error) {
    $success = "L'utilisateur a été modifié";
    header("Location: ../index.php?success=$success");
} else {
    header("Location: ../index.php?error=$error");
}

?>