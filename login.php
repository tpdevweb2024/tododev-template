<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identifiez-vous - TODODEV</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg_login">
    <div class="wrapper">
        <h2>TODODEV</h2>
        <h3>Identifiez-vous</h3>
        <form action="req/controlLogin.php" method="POST" class="form">
            <div class="input_email">
                <input type="text" name="email" id="email" required placeholder="Votre email">
            </div>
            <div class="input_pass">
                <input type="password" name="password" id="password" required placeholder="Mot de passe">
            </div>
            <div class="btn">
                <input type="submit" value="Se connecter">
            </div>
        </form>
        <div class="forgot">
            <a href="/resetpass.php">Mot de passe oublié ?</a>
        </div>
        <div class="registerLink">
            <a href="/register.php">S'enregistrer gratuitement</a>
        </div>
    </div>
</body>

</html>