<?php
require "config.php";

$req = $pdo->query("SELECT * FROM characters WHERE validated = 0");
$characters = $req->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($characters);
