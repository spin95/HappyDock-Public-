<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$home = trim($_POST['home2']);
$date = trim($_POST['date2']);
$value = trim($_POST['value2']);
$error = null;

if (empty($home) || empty($date) || empty($value)) {
    $error = "Veuillez remplir tous les champs";
}
$req = $bdd->query("UPDATE consumption SET consumption='$value' WHERE date='$date'");

if (!$error) {
    $success = "La valeur a été modifiée";
    header("Location: ../index.php?success=$success");
} else {
    header("Location: ../index.php?error=$error");
}

?>