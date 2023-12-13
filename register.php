<?php

require_once 'dbcon.php';
require_once 'usersR.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userRegistration = new UserRegistration($conn);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_name = $_POST['role_name'];

    $userRegistration->registerUser($username, $email, $password, $role_name);
}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form  method="POST">
      <div class="input-box">
        <input type="text" name="username" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <select name="role_name" >
          <option value="admin">admin</option>
          <option value="candidat">candidat</option>
        </select>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <a href="login.php"><input type="Submit" value="Register Now"></a>
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>