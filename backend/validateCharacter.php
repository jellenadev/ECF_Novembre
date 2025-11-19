<?php
require "config.php";

$id = $_GET["id"];

$req = $pdo->prepare("UPDATE characters SET validated = 1 WHERE id = ?");
$req->execute([$id]);

echo "ok";
