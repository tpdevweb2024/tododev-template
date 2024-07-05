<?php
var_dump($_POST);
// On récupères les infos du form
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);
$confirmPassword = htmlspecialchars($_POST["confirm_password"]);

// Comparaison des passes
if ($password !== $confirmPassword) {
    header("Location: ../register.php?error=bad");
    die;
}

// On traite l'ajout de l'user
$bdd = new PDO("sqlite:../database/data.db");

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$req = $bdd->prepare("INSERT INTO users (email, passwd) VALUES (?, ?)");
$req->execute([$email, $passwordHash]);

// Pour récupérer l'id généré
// $id = $bdd->lastInsertId();
// var_dump($id);


header("Location: ../index.php");
die;
