<?php


$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['user'])) {

    require __DIR__ . '/User.Class.php';

    $email = (isset($data['user']['email']) ? $data['user']['email'] : NULL);
    $firstname = (isset($data['user']['firstname']) ? $data['user']['firstname'] : NULL);
    $lastname = (isset($data['user']['lastname']) ? $data['user']['lastname'] : NULL);
    $username = (isset($data['user']['username']) ? $data['user']['username'] : NULL);
    $password = (isset($data['user']['password']) ? $data['user']['password'] : NULL);

    // validated the request
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        http_response_code(400);
        echo json_encode(['errors' => ["Invalid email format"]]);
    } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {

        http_response_code(500);
        echo json_encode(['errors' => ["Invalid username format"]]);
    } else {
        $task = new User();
        echo $task->Register($email, $firstname, $lastname, $username, md5($password));
    }
}