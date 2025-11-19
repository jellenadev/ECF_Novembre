<?php
require "config.php";

header("Content-Type: text/plain");

$email = $_POST["email"] ?? "";
$pseudo = $_POST["pseudo"] ?? "";
$password = $_POST["password"] ?? "";

if (!$email || !$pseudo || !$password) {
    echo "error";
    exit;
}


$check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$check->execute([$email]);

if ($check->fetch()) {
    echo "exists";
    exit;
}

$query = $pdo->prepare("
    INSERT INTO users (email, pseudo, password, role, status)
    VALUES (?, ?, ?, 'employee', 'active')
");

$ok = $query->execute([$email, $pseudo, $password]);

echo $ok ? "ok" : "error";
?>
