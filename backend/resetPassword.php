<?php
require "config.php";

$email = $_POST["email"] ?? "";

$req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$req->execute([$email]);
$user = $req->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Cet email n'existe pas.";
    exit();
}


$tempPass = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);


$update = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
$update->execute([$tempPass, $email]);


echo "Un mail a été envoyé avec votre nouveau mot de passe temporaire : $tempPass";
?>