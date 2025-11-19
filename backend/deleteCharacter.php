<?php
require "config.php";

header("Content-Type: text/plain");

if (!isset($_POST["id"])) {
    echo "error";
    exit;
}

$id = (int) $_POST["id"];

$stmt = $pdo->prepare("DELETE FROM characters WHERE id = ?");
$ok = $stmt->execute([$id]);

if ($ok) {
    echo "ok";
} else {
    echo "error";
}
?>
