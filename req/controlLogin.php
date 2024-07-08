<?php

$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]); // ENTRE AU NIVEAU DU FORM

$bdd = new PDO("sqlite:../database/data.db");

$req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
$req->bindValue(":email", $email);
$req->execute();
$user = $req->fetch();

// SI L'USER N'EXISTE PAS ON REDIRIGE
if (!$user) {
    header("Location: ../login.php?error=bad");
    die;
}

// SI L'USER EXISTE, ON VERIFIE LE MDP
$passwordHash = $user["passwd"]; // MOT DE PASSE HASHE EN BDD
if (password_verify($password, $passwordHash)) {
    // LES MDP CORRESPONDENT DONC ON INSTANCIE UNE SESSION d'AUTH
    session_start();
    $_SESSION["id"] = $user["id"];
    unset($_SESSION['temp_email']);
    // ON REDIRIGE VERS L'APPLI
    header("Location:../index.php");
} else {
    header("Location:../login.php?error=pass");
}
