<?php

session_start();
$email = $_SESSION['temp_email'];

$password = htmlspecialchars($_POST['password']);
$confirmPassword = htmlspecialchars($_POST['confirm_password']);

if ($password !== $confirmPassword) {
    header("Location:../index.php?error=pass");
    die;
}

$bdd = new PDO("sqlite:../database/data.db");
$req = $bdd->prepare("UPDATE users SET passwd = :passwd WHERE email = :email");
$req->bindValue(":passwd", password_hash($password, PASSWORD_BCRYPT));
$req->bindValue(":email", $email, PDO::PARAM_STR);
$req->execute();

header("Location:../index.php");
