<?php
require 'add_offre.php';
$dbOperations = new DbOperations($conn);
if (isset($_POST['searchInput'])) {
    $searchInput = $_POST['searchInput'];
    echo 'Search Input: ' . $searchInput;
if (isset($_POST['searchInput'])) {
    $searchInput = $_POST['searchInput'];
    $offres = $dbOperations->searchOffres($searchInput);
    if (!empty($offres)) {
        foreach ($offres as $offre) {
            echo '<article class="postcard light green">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="' . $offre['image_path'] . '" alt="Image Title" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h3 class="postcard__title green"><a href="#">' . $offre['title'] . '</a></h3>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i>
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt">' . $offre['description'] . '</div>
                        <ul class="postcard__tagbox">
                            <li class="tag__item"><i class="fas fa-tag mr-2"></i>' . $offre['location'] . '</li>
                            <li class="tag__item play green">
                                <a href="register.php"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
                            </li>
                        </ul>
                    </div>
                </article>';
        }
    } else {
        echo '<p>No results found</p>';
    }
}}
?>
