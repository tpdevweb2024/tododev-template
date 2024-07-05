<?php

// RECEVOIR LE FORMULAIRE
var_dump($_POST);

$name = htmlspecialchars($_POST["name"]);
$description = htmlspecialchars($_POST["description"]);
$priority = htmlspecialchars($_POST["priority"]);

$end_date = htmlspecialchars($_POST["end_date"]);
$end_date = date("Y-m-d H:i:s", strtotime($end_date));

// CREER LA TACHE EN SQLITE
$bdd = new PDO("sqlite:../database/data.db");

$req = $bdd->prepare("
    INSERT INTO tasks (name, description, end_date, priority) 
    VALUES (?, ?, ?, ?)
");
$req->execute([$name, $description, $end_date, $priority]);

header("Location: ../index.php");
