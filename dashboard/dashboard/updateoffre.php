





















































<!-- if (isset($_GET['job_id'])) {
    $jobId = $_GET['job_id'
    $query = "SELECT * FROM jobs WHERE job_id = $jobId";
    $result = mysqli_query($conn, $query);
    $job = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $Location = $_POST['location'];
        $updateOperation = new UpdateOperation($conn);
        $success = $updateOperation->updateJob($jobId, $title, $description, $location
        if ($success) {
            echo "Job updated successfully!";
        } else {
            echo "Failed to update the job.";
        }
        $job = $UpdateOperation->getJobById($jobId);
} -->
