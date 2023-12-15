<?php

class UserLogin
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function loginUser($email, $password)
    {
        $query = "SELECT * FROM users WHERE email='$email' ";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($user && password_verify($password, $user['password'])) {
                
                $role = $user['role_name'];
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $role;

                if ($role === 'admin') {
                header ('Location:dashboard/dashboard.php');
                } 
                elseif($role === 'candidat') {
                header ('location:index.php');
                }
            } else{
                echo "<script>alert('Error1949 You have a default try again');</script>";
            }
        }
    }
}
?>
