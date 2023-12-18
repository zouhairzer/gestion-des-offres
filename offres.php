<?php

include ('dbcon.php');

    class InsertOffre
    { 
        public function insertion($title, $description, $location,$image)
        {
            $database = new connection("localhost","root","","offres_des_emplois");  
            $conn=$database->getConnexion();

            $query = "INSERT INTO `jobs`(`title`, `description`,`location`,`image_path`) VALUES('$title', '$description','$location','$image')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return 1; 
            } else {
                return 0; 
            }
        }
    }

    class DbOperations
    {
        private $conn;
    
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
    
        public function getAllOffres()
        {
            $query = "SELECT * FROM jobs"; 
            $result = mysqli_query($this->conn, $query);
    
            $offres = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $offres[] = $row;
            }
    
            return $offres;
        }
    
        public function searchOffres($searchInput)
        {
            $query = "SELECT * FROM jobs WHERE description LIKE '%$searchInput%'";
            $result = mysqli_query($this->conn, $query);
    
            $offres = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $offres[] = $row;
            }
    
            return $offres;
        }
    }
    



    class UpdateOffres
    { 
        public function update($title, $description, $location, $image, $jobId)
        {
            $database = new connection("localhost", "root", "", "offres_des_emplois");  
            $conn = $database->getConnexion();
        
            $query = "UPDATE `jobs` SET `title`='$title',`description`='$description',`location`='$location',`image_path`='$image'  WHERE jobs.job_id = $jobId";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return 1; 
            } else {
                return 0; 
            }
        }
        
    
    }   
    
?>