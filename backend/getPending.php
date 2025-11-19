<?php
require "config.php";

header("Content-Type: application/json");

$req = $pdo->query("SELECT * FROM characters WHERE status = 'pending'");
$characters = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($characters);
exit;
?>
