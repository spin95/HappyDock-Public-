<?php

// connection a la BDD
include '../database_connexion.php';

// variable initialisation
$home = trim($_POST['home']);
$date = trim($_POST['date']);
$value = trim($_POST['value']);
$error = null;

if (empty($home) || empty($date) || empty($value)) {
    $error = "Veuillez remplir tous les champs";
}
$req = $bdd->query("INSERT INTO consumption (home, date, consumption) VALUES ('$home', '$date', '$value')");

if (!$error) {
    $success = "La donnée a été ajouté";
    header("Location: ../index.php?success=$success");
} else {
    header("Location: ../index.php?error=$error");
}

?>