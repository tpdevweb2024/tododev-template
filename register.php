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
        <div class="registerLink">
            <a href="/login.php">S'authentifier</a>
        </div>
    </div>

    <script type="module">
        import domains from "./assets/files/domains.js";
        // - 8 caractères mini
        // - Au moins un caractère spécial
        // - Au moins une majuscule
        // - Au moins une minuscule
        // - Au moins 1 chiffre
        const form = document.querySelector(".form");
        const email = document.querySelector("#email");
        const password = document.querySelector("#password");
        const confirmPassword = document.querySelector("#confirm_password");

        email.addEventListener("input", () => {
            const regex = /^[\w-.]+@([\w-]+.)+[\w-]{2,}$/gm;
            email.style.border = email.value.match(regex) ? "1px solid green" : "1px solid red";
        })

        password.addEventListener("input", () => {
            password.style.border = password.value.length < 8 ? "1px solid red" : "1px solid green";
        })

        confirmPassword.addEventListener("input", () => {
            confirmPassword.style.border = confirmPassword.value !== password.value ? "1px solid red" : "1px solid green";
        })

        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();

        // })
    </script>
</body>

</html>