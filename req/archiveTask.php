<?php

session_start();

$bdd = new PDO("sqlite:../database/data.db");

$id = intval(htmlspecialchars($_GET["id"]));

$req = $bdd->prepare("UPDATE tasks SET is_archived = 1 WHERE id = ? AND user_id = ?");
$req->execute([$id, $_SESSION["id"]]);

header("Location:../index.php");
