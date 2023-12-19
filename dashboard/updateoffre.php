<?php 
require 'offres.php';
include_once('dbcon.php');


if (isset($_GET['job_id'])) {
    $jobid  = $_GET['job_id'];
    $query = "SELECT * FROM jobs where job_id = '$jobid'"; 
    $result = mysqli_query($this->conn, $query); 
}

?>