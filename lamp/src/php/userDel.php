<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$id3 = trim($_POST['id3']);
$error = null;

if (empty($id3)) {
    $error = "Veuillez remplir tous les champs";
}
if ($id3>50 || $password>254) {
    $error = "Les champs ne peuvent pas excéder 50 caractères";
}

$req = $bdd->query("DELETE FROM user WHERE id='$id3'");

if (!$error) {
    $success = "L'utilisateur a été supprimé";
    header("Location: ../index.php?success=$success");
} else {
    header("Location: ../index.php?error=$error");
}

?>