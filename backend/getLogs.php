<?php
require "config.php";

$req = $pdo->query("SELECT * FROM logs ORDER BY date DESC");
$logs = $req->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($logs);
