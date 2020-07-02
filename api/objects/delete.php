
<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['employee'])) {

    require __DIR__ . '/library.php';

    $task_id = (isset($data['employee']['id']) ? $data['employee']['id'] : NULL);

    // Delete the Task
    $task = new Task();
    $task->Delete($task_id);
}
