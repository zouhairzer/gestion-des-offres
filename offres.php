<?php

include ('dbcon.php');

    class InsertOffre
    { 
        public function insertion($title, $description, $location)
        {
            $database = new connection("localhost","root","","offres_des_emplois");  
            $conn=$database->getConnexion();

            $query = "INSERT INTO `jobs`(`title`, `description`,`location`) VALUES('$title', '$description','$location')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return 1; 
            } else {
                return 0; 
            }
        }
    }


    // class affichage
    // { 
    //     public function affiche()
    //     {
    //         $database = new connection("localhost","root","","offres_des_emplois");  
    //         $conn=$database->getConnexion();

    //         $query = "SELECT * FROM jobs";
    //         $result = mysqli_query();
    //         if ($result) {
    //             // header 'location:dashboard/offre.php');
    //             return 1; 
    //         } else {
    //             return 0; 
    //         }
    //     }
    // }

?>


