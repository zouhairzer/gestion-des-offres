<?php
  
    class connection{
        public $host ;
        public $user ;
        public $pass ;
        public $db ;
        public $conn ;

        public function __construct($host, $user, $pass, $db) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->db = $db;
            $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);   
        }
        public function getConnexion(){
            return $this->conn;
            
            if($conn){
                echo "Connection established";
            }
        }
        
        
    }   
    $database = new connection("localhost","root","","offres_des_emplois");  
    $conn=$database->getConnexion();
    
?>