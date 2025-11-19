<?php
require "config.php";

$id = $_POST["id"] ?? null;

if (!$id) {
    echo "error";
    exit;
}

$req = $pdo->prepare("DELETE FROM users WHERE id = ?");
$ok = $req->execute([$id]);

echo $ok ? "ok" : "error";
