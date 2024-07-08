<?php

$k = htmlspecialchars($_GET["k"]);
$ts = htmlspecialchars($_GET["ts"]);

function decryptUrl($param)
{
    // On prends les 5 caractères à partir de la position 16 [ 16 / 17 / 18 / 19 / 20 ]
    $cryptedMail1 = substr($param, 16, 5);
    // On prends tous les caractères restants depuis la 97e position (16 rand + 5 car cryptés + 76 rand)
    $cryptedMail2 = substr($param, 97);
    // Enleve les 28 derniers caracteres (120 - 28 de la derniere chaine rand)
    $cryptedMail2 = substr($cryptedMail2, 0,  -28);

    // On décode pour retrouver l'email
    return base64_decode($cryptedMail1 . $cryptedMail2);
}
session_start();
$_SESSION['temp_email'] = decryptUrl($k);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Définir son nouveau mot de passe - TODODEV</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg_login">
    <div class="wrapper">
        <h2>TODODEV</h2>
        <h3>Enregistrez-vous, c'est gratuit !</h3>
        <form action="req/updatePass.php" method="POST" class="form">
            <div class="input_pass">
                <input type="password" name="password" id="password" required placeholder="Mot de passe">
            </div>
            <div class="input_pass">
                <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirmer mot de passe">
            </div>
            <div class="btn">
                <input type="submit" value="Changer de mot de passe">
            </div>
        </form>
    </div>
</body>

</html>