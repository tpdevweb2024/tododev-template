<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrez-vous - TODODEV</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg_login">
    <div class="wrapper">
        <h2>TODODEV</h2>
        <h3>Enregistrez-vous, c'est gratuit !</h3>
        <form action="req/addUser.php" method="POST" class="form">
            <div class="input_email">
                <input type="text" name="email" id="email" required placeholder="Votre email">
            </div>
            <div class="input_pass">
                <input type="password" name="password" id="password" required placeholder="Mot de passe">
            </div>
            <div class="input_pass">
                <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirmer mot de passe">
            </div>
            <div class="btn">
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </div>
</body>

</html>