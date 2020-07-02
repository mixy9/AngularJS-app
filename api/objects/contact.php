<?php

require __DIR__ . '\..\config\config.php';

class ContactForm {

    protected $db;

    /**
     * ContactForm constructor.
     */
    public function __construct() {
        $this->db = Database::Connect();
    }

    /**
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param string $username
     * @param string $password
     * @return false|string
     */
    public function Register($email, $firstname, $lastname, $username, $password) {
        $query = $this->db->prepare("INSERT INTO user(email, firstname, lastname, username, password) VALUES (:email,:firstname,:lastname,:username,:password)");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['user' => [
            'id'          => $this->db->lastInsertId(),
            'email'       => $email,
            'firstname'   => $firstname,
            'lastname'    => $lastname,
            'username'    => $username,
            'password'    => $password,
        ]]);
    }

    /**
     * @return false|string
     */
    public function Fetch() {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['users' => $data]);
    }
}