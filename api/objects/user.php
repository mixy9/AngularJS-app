<?php

require __DIR__ . '\..\config\config.php';

class User
{

    protected $db;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @param $email
     * @param $firstname
     * @param $lastname
     * @param $username
     * @param $password
     * @return string
     */
    public function Register($email, $firstname, $lastname, $username, $password)
    {

        $query = $this->db->prepare("INSERT INTO user(email, firstname, lastname, username, password) VALUES (:email,:firstname,:lastname,:username,:password)");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['user' => [
            'id' => $this->db->lastInsertId(),
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => $password,
        ]]);
    }

    /**
     * @param string $username
     * @param string $password
     * @return mixed
     */
    public function LogIn($username, $password)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");

        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->execute();

        $count = $query->rowCount();

        if ($count > 0)
        {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $row['userid'];
        } else {
            $_SESSION['user'] = '';
        }

        return print_r($query);
    }

    /**
     * @return string
     */
    public function Fetch()
    {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();

        $data = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['user' => $data]);
    }
}

$user = new User();
echo $user->Fetch();