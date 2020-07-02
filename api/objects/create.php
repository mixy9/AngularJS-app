
<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['employee'])) {

    require __DIR__ . '/library.php';

    $name = (isset($data['employee']['name']) ? $data['employee']['name'] : NULL);
    $email = (isset($data['employee']['email']) ? $data['employee']['email'] : NULL);
    $phone = (isset($data['employee']['phone']) ? $data['employee']['phone'] : NULL);
    $address = (isset($data['employee']['address']) ? $data['employee']['address'] : NULL);
    $description = (isset($data['employee']['description']) ? $data['employee']['description'] : NULL);

    // validated the request
    if ($name == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Name Field is required"]]);

    } else {

        $task = new Task();
        echo $task->Create($name, $email, $phone, $address, $description);
    }
}