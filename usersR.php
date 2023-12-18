<?php

include_once('dbcon.php');

class UserRegistration
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function registerUser($username, $email, $password, $role_name)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, role_name) VALUES ('$username', '$email', '$hashedPassword', '$role_name')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            header ('location:login.php');
        } else {
            echo "Error: " . mysqli_error($this->db);
        }
    }
}

?>
