<?php


$id = htmlspecialchars($_GET["id"]);

$bdd = new PDO("sqlite:../database/data.db");
$req = $bdd->prepare("DELETE FROM tasks WHERE id = ?");
$req->execute([$id]);

// header("Location:../index.php");
