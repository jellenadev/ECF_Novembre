<?php
require "config.php";

$pseudo = $_POST["pseudo"] ?? "";

$req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$req->execute([$pseudo]);

if ($req->rowCount() > 0) {
    echo "exists";
} else {
    echo "notfound";
}
?>