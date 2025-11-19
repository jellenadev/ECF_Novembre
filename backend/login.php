<?php
require "config.php";

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$req->execute([$email]);
$user = $req->fetch(PDO::FETCH_ASSOC);

header("Content-Type: application/json");

if (!$user) {
    echo json_encode(["status" => "notfound"]);
    exit;
}

if ($password !== $user["password"]) {
    echo json_encode(["status" => "wrongpass"]);
    exit;
}

echo json_encode([
    "status" => "ok",
    "id" => $user["id"],      
    "email" => $user["email"],
    "pseudo" => $user["pseudo"],
    "role" => $user["role"]
]);
exit;
?>
