<?php
require_once '../add_offre.php';
require 'updateoffre.php';

$dbOperations = new DbOperations($conn);
$offres = $dbOperations->getAllOffres();

if (isset($_GET['job_id'])) {
    $id = $_GET['job_id'];

    // Fetch the job details for editing
    $job = $dbOperations->getJobById($id);

    // Update Record in customer table
    if (isset($_POST['update'])) {
        $dbOperations->updateOffres($_POST, $id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                  
                    <a href="articles.php" class="nav-link text-white-50">Dashboard</a>
                   
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg" alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="articles.php" class="sidebar_link"><img src="img/articles.svg" alt="icon">Articles</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="">Settings</a>

            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white">
                    <a href="inpoffre.php"><button type="button" class="btn btn-dark  btn btn-outline-light ">Add New Offer</button></a>
                    <thead class="bg-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>location</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($offres as $offre) :?>
                    <tr class="freelancer">
                        <td>
                            <p class="fw-bold mb-1 f_name"><?= $offre['title'];?></p>
                        </td>
                        <td>
                            <p class="text-muted mb-0 f_email"><?= $offre['description'];?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1 f_title"><?= $offre['location']; ?></p>
                        </td>
                        <td>
                            <span class="f_status"><?= $offre['date_created']; ?></span>
                        </td>
                        <td class="f_position">
                            <a href="../deletoffre.php?job_id=<?php echo $offre['job_id'] ?>"><img class="delet_user" src="img/146131.svg" style="width: 12px;" alt=""></a>
                            
                        </td>
                        <td>
                            <img class="ms-2 edit" src="img/edit.svg"  alt="">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

                
            </section>
            <!-- edit modal -->
                <div class="modal">
                    <div class="modal-content" >
                    <form id="forms" method="POST" action="../dashboard/offres.php?job_id=<?php echo $id; ?>">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control first_name" name="title" value="<?php echo isset($job['title']) ? $job['title'] : ''; ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control last_name" name="location" value="<?php echo isset($job['location']) ? $job['location'] : ''; ?>">
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div class="mb-4">
                <label class="form-label">Description</label>
                <input type="text" class="form-control email" name="description" value="<?php echo isset($job['description']) ? $job['description'] : ''; ?>">
            </div>

            <!-- Text input -->
            <div class="mb-4">
                <label class="form-label">Date</label>
                <input type="text" class="form-control title_user" name="date" value="<?php echo isset($job['date_created']) ? $job['date_created'] : ''; ?>">
            </div>
            <!-- Submit button -->
            <div class="d-flex w-100 justify-content-center">
                <p class="error text-danger"></p>
                <input type="submit" name="update" class="btn btn-success btn-block mb-4 me-4 save" href="offres.php" value="Save Edit">
                <button class="btn btn-danger btn-block mb-4 annuler">Annuler</button>
            </div>
        </form>
                            
                    </div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="dashboard.js"></script>
        <script src="agents.js"></script>
</body>

</html>