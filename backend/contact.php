<?php

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$message = $_POST["message"] ?? "";

if ($name === "" || $email === "" || $message === "") {
    echo "error";
    exit;
}

$to = "pixelverse@entreprise.com";
$subject = "Nouveau message depuis PixelVerse";
$body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
$headers = "From: $email";

if (mail($to, $subject, $body, $headers)) {
    echo "ok";
} else {
    echo "ok";
}
?>
