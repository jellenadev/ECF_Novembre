<?php
require "config.php";

$id = $_POST["id"] ?? null;
$status = $_POST["status"] ?? null;

if (!$id || !$status) {
    echo "error";
    exit;
}

$req = $pdo->prepare("UPDATE users SET status = ? WHERE id = ?");
$ok = $req->execute([$status, $id]);

echo $ok ? "ok" : "error";
