<?php


class JobManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addJob($title, $description, $image)
    {
        $query = "INSERT INTO jobs (title, description, image) VALUES ('$title', '$description', '$image')";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            echo "l'offre est ajouter";
        } else {
            echo "Error: " . mysqli_error($this->db);
        }
    }

}
?>
