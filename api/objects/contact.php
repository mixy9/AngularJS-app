<?php

require __DIR__ . '\..\config\config.php';


if (!empty($_POST["send"])) {

    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $toEmail = "mihaela.trempetic@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";

    if (mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
}