<?php

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if (!$email) {
    header("Location:../index.php?error=notemail");
    die;
}

function createLink(string $email): string
{
    $cryptedMail = base64_encode($email); // YW50aG9AZGV2LmZy
    $cryptedMail1 = substr($cryptedMail, 0, 5); // 5 premiers caracteres
    $cryptedMail2 = substr($cryptedMail, 5); // Reste des caractères
    $timestamp = time();
    $randomStrings = bin2hex(random_bytes(60)); // 120 caractères
    $randomStrings1 = substr($randomStrings, 0, 16);
    $randomStrings2 = substr($randomStrings, 16, 76);
    $randomStrings3 = substr($randomStrings, 92);

    $string = $randomStrings1 . $cryptedMail1 . $randomStrings2 . $cryptedMail2 . $randomStrings3;
    return "http://localhost:8000/changePassword.php?k=" . $string . "&ts=" . $timestamp;
}

$sendLink = createLink($email);
var_dump($sendLink);
