<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - TODODEV</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg_login">
    <div class="wrapper">
        <h2>TODODEV</h2>
        <h3>Réinitialiser le password</h3>
        <form action="req/sendEmailPass.php" method="POST" class="form">
            <div class="input_email">
                <input type="text" name="email" id="email" required placeholder="Votre email">
            </div>
            <div class="btn">
                <input type="submit" value="Réinitialiser">
            </div>
        </form>
    </div>
</body>

</html>