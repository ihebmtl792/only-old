<?php
require_once "../db/connection.php";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $select = mysqli_query($conn,"SELECT * FROM `restaurants` WHERE  location   LIKE '%$search%'");

}

?>

<div class="row g-4" id="display">

<?php
$get_foods = mysqli_query($conn, "SELECT * FROM `restaurants` WHERE  location   LIKE '%$search%'");

while ($food = mysqli_fetch_assoc($get_foods)) {




?>
    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


        <div class="service-item rounded pt-3">

            <b class="btn btn-info"> <?= $food['restaurant_name']; ?></b>
            <div class="p-4">

                <a href="items.php?id=<?= $food['id']; ?>">

                    <center>

                        <img width="150" src="foods/<?= $food['restaurant_name']; ?>" alt="">

                        <img src="img/<?= $food['file']; ?>" alt="">
                        <h5><?= ucfirst($food['restaurant_name']); ?></h5>

                      
                    </center>
                </a>

            </div>
        </div>
    </div>

<?php } ?>

</div>