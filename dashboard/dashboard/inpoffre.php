<?php
  require '../add_offre.php';
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
    <form  method="POST" action="../add_offre.php" enctype="multipart/form-data">
      <div >
        <input type="file" name="img" placeholder="title" value = "<?php if(isset($_GET['job_id'])){echo $image;}?>">
      </div>
      <div class="row">
        <input type="text" name="title" placeholder="title" value = "<?php if(isset($_GET['job_id'])){echo $title;}?>" required>
      </div>
        <input type="hidden" name="jobid" value = "<?php if(isset($_GET['job_id'])){echo $_GET['job_id'];}?>">
      <div class="row">
        <input type="text" name="description" placeholder="Description" value = "<?php if(isset($_GET['job_id'])){echo $description;}?>"  required>
      </div>
      <div class="row">
        <input type="text" name="location" placeholder="location" value = "<?php if(isset($_GET['job_id'])){echo $location;}?>"  required>
      </div>
      <div class="row button" >
          <input type='Submit' style='background-color:#343a40;' name='submit' > 
      </div>
    </div>
  </div>  
  </form>
  </div>
</body>

</html>