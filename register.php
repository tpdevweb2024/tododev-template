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

                <div class="input_pass_eye">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path>
                    </svg>
                    <input type="password" name="password" id="password" required placeholder="Mot de passe">

                </div>


                <div class="error_pass"></div>
                <div class="errors">
                    <div class="error_length"><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
                        </svg> Doit faire au moins 8 caractères</div>
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
                <div class="input_pass_eye">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path>
                    </svg><input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirmer mot de passe">
                </div>
                <div class="error_confirmpass"></div>
            </div>
            <div class="btn">
                <input type="submit" value="Se connecter" id="submit" disabled>
            </div>
        </form>
        <div class="registerLink">
            <a href="/login.php">S'authentifier</a>
        </div>
    </div>

    <script>
        const form = document.querySelector(".form");
        const email = document.querySelector("#email");
        const password = document.querySelector("#password");
        const confirmPassword = document.querySelector("#confirm_password");
        const uppers = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        const lowers = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        const numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        const specials = ["!", "#", "$", "%", "&", "'", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "]", "^", "_", "{", "|", "}"];
        const svgs = document.querySelectorAll(".input_pass_eye > svg");

        for (let svg of svgs) {
            let input = svg.nextElementSibling;
            svg.addEventListener("mousedown", () => {
                input.setAttribute("type", "text");
            })
            svg.addEventListener("mouseup", () => {
                input.setAttribute("type", "password");
            })
        }


        email.addEventListener("input", () => {
            const regex = /^[\w\-.]+@([\w-]+.)+[\w-]{2,}$/gm;
            email.style.border = email.value.match(regex) ? "1px solid green" : "1px solid red";
            document.querySelector(".error_email").textContent = !email.value.match(regex) ? "Cet email n'est pas valide" : "";
            if (email.value.length > 0 && checkPassword()) {
                document.getElementById("submit").removeAttribute("disabled");
                console.log("test");
            }
        })

        password.addEventListener("focus", () => {
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

            document.querySelector(".error_upper").style.color = (rules.uppers > 0) ? "green" : "inherit";
            document.querySelector(".error_lower").style.color = (rules.lowers > 0) ? "green" : "inherit";
            document.querySelector(".error_special").style.color = (rules.specials > 0) ? "green" : "inherit";
            document.querySelector(".error_number").style.color = (rules.numbers > 0) ? "green" : "inherit";
            document.querySelector(".error_length").style.color = (rules.count >= 8) ? "green" : "inherit";

            if (rules.count >= 8 && rules.lowers > 0 && rules.uppers > 0 && rules.specials > 0 && rules.numbers > 0) {
                password.style.border = "1px solid green";
                document.querySelector(".error_pass").textContent = "";
                if (email.value.length > 0 && checkPassword()) {
                    document.getElementById("submit").removeAttribute("disabled");
                }
            } else {
                password.style.border = "1px solid red";
                document.querySelector(".error_pass").textContent = "Le mot de passe ne correspond pas aux exigences";
            }

        })

        confirmPassword.addEventListener("input", () => {
            confirmPassword.style.border = confirmPassword.value !== password.value ? "1px solid red" : "1px solid green";
            document.querySelector(".error_confirmpass").textContent = confirmPassword.value !== password.value ? "Les mots de passe ne sont pas identiques" : "";
            if (email.value.length > 0 && checkPassword()) {
                document.getElementById("submit").removeAttribute("disabled");
            }
        })

        function checkPassword() {
            return password.value === confirmPassword.value;
        }
    </script>
</body>

</html>