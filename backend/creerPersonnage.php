<?php
require "config.php";

header("Content-Type: text/plain");

if (!isset($_POST["user_id"])) {
    echo "error";
    exit;
}

$user_id = $_POST["user_id"];
$name = $_POST["name"] ?? "";
$gender = $_POST["gender"] ?? "";
$class = $_POST["class"] ?? "";
$weapon = $_POST["weapon"] ?? "";
$description = $_POST["description"] ?? "";

$portrait_name = null;

if (!empty($_FILES["portrait"]["name"])) {
    $folder = "portraits/";
    if (!is_dir($folder)) mkdir($folder);

    $portrait_name = time() . "_" . basename($_FILES["portrait"]["name"]);
    move_uploaded_file($_FILES["portrait"]["tmp_name"], $folder . $portrait_name);
}

function randomColor() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

$color1 = randomColor();
$color2 = randomColor();

$query = $pdo->prepare("
    INSERT INTO characters (user_id, name, gender, class, weapon, description, portrait, color1, color2, created_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
");

$ok = $query->execute([
    $user_id,
    $name,
    $gender,
    $class,
    $weapon,
    $description,
    $portrait_name,
    $color1,
    $color2
]);

echo $ok ? "ok" : "error";
