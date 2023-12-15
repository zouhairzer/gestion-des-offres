<?php 
require 'offres.php';
include_once('dbcon.php');


if (isset($_POST['submit'])) {
    $Insertion = new InsertOffre();
    
    $titl = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date= $_POST['date'];
    
    $Insertion->Insertion($titl, $description,$location);

    if($Insertion = 0 ){
        echo "<script>Invalid Add</script>";
    }
    else if($Insertion = 1){
        header ('location:dashboard/articles.php'); 
}

else{echo"eroooooor";}
    
}

?>