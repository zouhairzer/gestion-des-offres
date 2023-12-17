<?php
require 'add_offre.php';

$updateOperations = new updateOffres($conn);
$update = $updateOperations->update();

if (isset($_GET['job_id'])) {
  $jobid  = $_GET['job_id'];
  $query = "SELECT * FROM jobs where job_id = '$jobid'"; 
  $result = mysqli_query($this->conn, $query); 
  $rows = mysqli_fetch_assoc($quer);
  $title = $rows['title'];
  $description = $rows['description'];
  $location = $rows['location'];
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="../styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style=" background-color: #1111;">
<div class="container ">
    <div class="wrapper">
    <div class="title" style="background-color:#343a40;"><span>New Project</span></div>
    <form  method="POST" action="../add_offre.php">
      <div class="row">
        <input type="text" name="title" placeholder="title" required>
      </div>
      <div class="row">
        <input type="text" name="description" placeholder="Description"  required>
      </div>
      <div class="row">
        <input type="text" name="location" placeholder="location" required>
      </div>
      <div class="row button" >
        <button type="Submit" style="background-color:#343a40;" name="submit">
          <?php
                if(isset($_GET['job_id'])){
                    echo "Modifier";
                } else {
                    echo "Envoyer";
                }
            ?>
        </button>
      </div>
    </div>
  </div>  
  </form>
  </div>
</body>

</html>