<?php
include ('dbcon.php');
    class DeleteOperation
        {
            private $conn;

            public function __construct($conn)
            {
                $this->conn = $conn;
            }

            public function deleteJob($jobId)
            {
                $query = "DELETE FROM  jobs WHERE job_id = $jobId";
                $result = mysqli_query($this->conn, $query);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    if (isset($_GET['job_id'])) {
            $jobId = $_GET['job_id'];
            $deleteOperation = new DeleteOperation($conn);
            $success = $deleteOperation->deleteJob($jobId);
        
            if ($success) {
                header ('location:dashboard/articles.php');
            } else {
                echo "Failed to delete the job.";
            }
        } else {
            echo "Invalid request. Job ID is missing.";
        }
?>