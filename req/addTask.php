<?php
session_start();

$name = htmlspecialchars($_POST["name"]);
$description = htmlspecialchars($_POST["description"]);
$priority = intval(htmlspecialchars($_POST["priority"]));

$end_date = htmlspecialchars($_POST["end_date"]);
$end_date = date("Y-m-d H:i:s", strtotime($end_date));

// CREER LA TACHE EN SQLITE
$bdd = new PDO("sqlite:../database/data.db");

$req = $bdd->prepare("
    INSERT INTO tasks (name, description, end_date, priority, user_id) 
    VALUES (:name, :description, :end_date, :priority, :user_id)
");
$req->bindValue(":name", $name, PDO::PARAM_STR);
$req->bindValue(":description", $description, PDO::PARAM_STR);
$req->bindValue(":end_date", $end_date, PDO::PARAM_STR);
$req->bindValue(":priority", $priority, PDO::PARAM_INT);
$req->bindValue(":user_id", $_SESSION['id']);
$req->execute();

header("Location: ../index.php");
