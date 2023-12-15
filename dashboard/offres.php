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

        public function updateOffres(){
            $title = $this->conn->real_escape_string($_POST['title']);
		    $location = $this->conn->real_escape_string($_POST['location']);
		    $description = $this->conn->real_escape_string($_POST['description']);
		    $date = $this->conn->real_escape_string($_POST['date']);
			$query = "UPDATE jobs SET title = '$title', location = '$location', description = '$description', `date_created`='$date' WHERE job_id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
        }
    
    ?>
    




