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
                <div class="error_email"></div>
            </div>
            <div class="input_pass">
                <input type="password" name="password" id="password" required placeholder="Mot de passe">
                <div class="error_pass"></div>
                <div class="errors" style="text-align: left; display: none">
                    <div class="error_upper"><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
                        </svg> Doit contenir une majuscule</div>
                    <div class="error_lower"><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
                        </svg> Doit contenir une minuscule</div>
                    <div class="error_number"><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
                        </svg> Doit contenir un chiffre</div>
                    <div class="error_special"><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
                        </svg> Doit contenir un caractère spécial</div>
                </div>
            </div>
            <div class="input_pass">
                <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirmer mot de passe">
                <div class="error_confirmpass"></div>
            </div>
            <div class="btn">
                <input type="submit" value="Se connecter">
            </div>
        </form>
        <div class="registerLink">
            <a href="/login.php">S'authentifier</a>
        </div>
    </div>

    <script>
        // import domains from "./assets/files/domains.js";
        // - 8 caractères mini
        // - Au moins un caractère spécial
        // - Au moins une majuscule
        // - Au moins une minuscule
        // - Au moins 1 chiffre
        const form = document.querySelector(".form");
        const email = document.querySelector("#email");
        const password = document.querySelector("#password");
        const confirmPassword = document.querySelector("#confirm_password");
        const uppers = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        const lowers = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        const numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        const specials = ["!", "#", "$", "%", "&", "'", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "]", "^", "_", "{", "|", "}"];

        email.addEventListener("input", () => {
            const regex = /^[\w\-.]+@([\w-]+.)+[\w-]{2,}$/gm;
            email.style.border = email.value.match(regex) ? "1px solid green" : "1px solid red";
            document.querySelector(".error_email").textContent = !email.value.match(regex) ? "Cet email n'est pas valide" : "";
        })

        password.addEventListener("click", () => {
            document.querySelector(".errors").style.display = "block"
        })

        password.addEventListener("input", () => {
            confirmPassword.style.border = "1px solid red"
            document.querySelector(".error_confirmpass").textContent = "Les mots de passe ne sont pas identiques";

            let rules = {
                count: 0,
                lowers: 0,
                uppers: 0,
                specials: 0,
                numbers: 0
            }
            const characters = password.value.split("");
            for (let character of characters) {
                rules.count = password.value.length;
                if (lowers.includes(character)) rules.lowers++;
                if (uppers.includes(character)) rules.uppers++;
                if (specials.includes(character)) rules.specials++;
                if (numbers.includes(character)) rules.numbers++;
            }

            if (rules.uppers > 0) document.querySelector(".error_upper").style.color = "green";

            if (rules.count >= 8 && rules.lowers > 0 && rules.uppers > 0 && rules.specials > 0 && rules.numbers > 0) {
                password.style.border = "1px solid green";
                document.querySelector(".error_pass").textContent = "";
            } else {
                password.style.border = "1px solid red";
                document.querySelector(".error_pass").textContent = "Le mot de passe ne correspond pas aux exigences";
            }

        })

        confirmPassword.addEventListener("input", () => {
            confirmPassword.style.border = confirmPassword.value !== password.value ? "1px solid red" : "1px solid green";
            document.querySelector(".error_confirmpass").textContent = confirmPassword.value !== password.value ? "Les mots de passe ne sont pas identiques" : "";
        })

        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();

        // })
    </script>
</body>

</html>