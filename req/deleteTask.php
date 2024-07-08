<?php
session_start();

$id = htmlspecialchars($_GET["id"]);

$bdd = new PDO("sqlite:../database/data.db");
$req = $bdd->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
$req->execute([$id, $_SESSION["id"]]);

// header("Location:../index.php");
