<?php

require __DIR__ . '/User.Class.php';

session_start();

$data = file_get_contents('php://input');
$request = json_decode($data);

$username = $request->username;
$password = $request->password;

$task = new User();
$task->LogIn($username, md5($password));

if (!empty($_SESSION['user'])) {
    http_response_code(200);
    echo json_encode(['errors' => ["Success!"]]);
} else {
    http_response_code(500);
    echo json_encode(['errors' => ["Error!"]]);
}
