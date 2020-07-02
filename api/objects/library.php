<?php

require __DIR__ . '\..\config\config.php';

/**
* Class Task
*/
class Task
{
    /**
    * @var mysqli|PDO|string
    */
    protected $db;

    /**
    * Task constructor.
    */
    public function __construct() {
        $this->db = Database::Connect();
    }

    /**
    * Add new Task
    *
    * @param $name
    * @param $email
    * @param $phone
    * @param $address
    * @param $description
    *
    * @return string
    */
    public function Create($name, $email, $phone, $address, $description) {
        $query = $this->db->prepare("INSERT INTO employees(name, email, phone, address, description) VALUES (:name,:email,:phone,:address,:description)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['employee' => [
        'id'          => $this->db->lastInsertId(),
        'name'        => $name,
        'email'       => $email,
        'phone'       => $phone,
        'address'     => $address,
        'description' => $description,
        ]]);
    }

    /**
    * List Tasks
    *
    * @return string
    */
    public function Read() {
        $query = $this->db->prepare("SELECT * FROM employees");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
        }

        return json_encode(['employees' => $data]);
    }


    /**
    * Update Task
    *
    * @param $name
    * @param $email
    * @param $phone
    * @param $address
    * @param $description
    * @param $employee_id
    */
    public function Update($name, $email, $phone, $address, $description, $employee_id) {
        $query = $this->db->prepare("UPDATE employees SET name = :name, email = :email, phone = :phone, address = :address, description = :description WHERE id = :id");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("address", $address, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("id", $employee_id, PDO::PARAM_STR);
        $query->execute();
    }

    /**
    * Delete Task
    *
    * @param $employee_id
    */
    public function Delete($employee_id) {
        $query = $this->db->prepare("DELETE FROM employees WHERE id = :id");
        $query->bindParam("id", $employee_id, PDO::PARAM_STR);
        $query->execute();
    }
}