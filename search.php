<?php

include 'dbcon.php';
$database = new connection("localhost","root","","offres_des_emplois");  
$conn=$database->getConnexion();


if(isset($_GET['title'])){
$title = $_GET['title'];
$sql = "SELECT * FROM jobs WHERE title LIKE '%$title%' ";
$result = mysqli_query($conn,$sql);

}

else{
    echo "Error";
}

while($row = mysqli_fetch_assoc($result)){?>
    <article class="postcard light green">
        <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="<?= $row['image_path'];?>" alt="Image Title" />
        </a>
        <div class="postcard__text t-dark">
            <h3 class="postcard__title green"><a href="#"><?= $row['title'];?></a></h3>
            <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i>
                </time>
            </div>
            <div class="postcard__bar"></div>
            <div class="postcard__preview-txt"><?= $row['description'];?></div>
            <ul class="postcard__tagbox">
                <li class="tag__item"><i class="fas fa-tag mr-2"></i><?= $row['location'];?></li>
                <li class="tag__item play green">
                    <a href="register.php"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
                </li>
            </ul>
        </div>
    </article>
    <?php }
    
    ?>