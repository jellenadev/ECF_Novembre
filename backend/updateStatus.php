<?php
require "config.php";

$id = $_POST["id"] ?? null;
$status = $_POST["status"] ?? null;

if (!$id || !$status) {
    echo "error";
    exit;
}

$q = $pdo->prepare("UPDATE characters SET status = ? WHERE id = ?");
$ok = $q->execute([$status, $id]);

echo $ok ? "ok" : "error";
