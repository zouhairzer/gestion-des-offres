<?php
require 'offres.php';
include_once('dbcon.php');

if (isset($_POST['submit'])) {
    $directory = "../img/";
    $Insertion = new InsertOffre();
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $name = $_FILES["img"]["name"];
    $path = $directory . $name;
    $fileType = pathinfo($path, PATHINFO_EXTENSION);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "svg");

    if (in_array($fileType, $allowedExtensions)) {
        move_uploaded_file($_FILES["img"]["tmp_name"], $path);

        $result = $Insertion->Insertion($title, $description, $location, $path);

        if ($result == 0) {
            echo "<script>alert('Invalid Add');</script>";
        } elseif ($result == 1) {
            header('location: dashboard/articles.php');
        } else {
            echo "Error";
        }
    } else {
        echo "Only JPG, JPEG, PNG, and GIF are allowed.";
    }
}

if (isset($_GET['job_id'])) {
    $jobid = $_GET['job_id'];
    $query = "SELECT * FROM jobs WHERE job_id = '$jobid'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_assoc($result);

    $title = $rows['title'];
    $description = $rows['description'];
    $location = $rows['location'];
    $image = $rows['image_path'];

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $updateOperations = new UpdateOffres();
        $updateResult = $updateOperations->update($title, $description, $location, $image, $jobid);

        if ($updateResult == 1) {
            header('location: dashboard/articles.php');
        } else {
            echo "Error updating record.";
        }
    }
}    
?>
