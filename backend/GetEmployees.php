<?php
require "config.php";

$req = $pdo->query("SELECT id, email, pseudo, role, status FROM users WHERE role = 'employee'");
$employees = $req->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($employees);
