<?php


require_once "db/connection.php";

$_SESSION['error'] = "";





$get_restaurant = mysqli_query($conn, "SELECT * FROM `orders`");


if (isset($_POST['Ajouter'])) {
    if (isset($_POST['restaurant_name'])) {
        $restaurant_name = $_POST['restaurant_name'];
    }

     
    if (isset($_POST['location'])) {
        $location = $_POST['location'];
    }


    if (isset($_FILES['img'])) {
        $file = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_error = $_FILES['img']['error'];
        $fileExt = explode(".", $file);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png", "svg");
        if (in_array($fileActualExt, $allowed)) {
            if ($file_error == 0) {
                if ($file_size < 600000000) {
                    $new_name = time() . '.' . $fileActualExt;
                    $target = "foods/" . $new_name;
                    if (!empty($file)) {
                        move_uploaded_file($_FILES['img']['tmp_name'], $target);

                        $_SESSION['error'] = "Le restaurant a été ajouté";

                        $add = mysqli_query($conn, "INSERT INTO `restaurants`( `restaurant_name`,`file`,`location`) VALUES ('$restaurant_name','$file','$location')");
                        header('location:add.php');
                    }
                } else {
                    $_SESSION['error'] =  "fichier trop gros";
                }
            } else {

                $_SESSION['error'] =  "Erreur dans votre fichier";
            }
        } else {
            $_SESSION['error'] =  "Erreur dans le type de fichier | accept: jpg , jpeg , png , svg";
        }
    }
}







if (isset($_POST['submit'])) {


    if (isset($_POST['id_restaurant'])) {
        $id_restaurant = $_POST['id_restaurant'];
        $select = mysqli_query($conn, "SELECT * FROM `restaurants` WHERE id = '$id_restaurant'");
        while ($row = mysqli_fetch_assoc($select)) {
            $restaurant_name = $row['restaurant_name'];
        }
    }






    if (isset($_POST['food_name'])) {
        $food_name = $_POST['food_name'];
    }
    if (isset($_POST['food_price'])) {
        $food_price = $_POST['food_price'];
    }

    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $fileExt = explode(".", $file);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png", "svg");
        if (in_array($fileActualExt, $allowed)) {
            if ($file_error == 0) {
                if ($file_size < 600000000) {
                    $new_name = time() . '.' . $fileActualExt;
                    $target = "foods/" . $new_name;
                    if (!empty($file)) {
                        move_uploaded_file($_FILES['file']['tmp_name'], $target);
                        // insert to database
                        $_SESSION['error'] = "À crête a été ajouté";
                        $insert = mysqli_query($conn, "INSERT INTO `foods`(`restaurant_name`,`id_restaurant`, `food_name`, `food_price`, `food_img`) VALUES ('$restaurant_name','$id_restaurant','$food_name','$food_price','$new_name')");
                        header('location:add.php');
                        exit();
                    }
                } else {
                    $_SESSION['error'] =  "fichier trop gros";
                }
            } else {

                $_SESSION['error'] =  "Erreur dans votre fichier";
            }
        } else {
            $_SESSION['error'] =  "Erreur dans le type de fichier | accept: jpg , jpeg , png , svg";
        }
    }
}








?>
<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->

</div>
<!-- Spinner End -->


<div class="container-xxl position-relative p-0">
    <?php include_once "db/nav.php"; ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-1">
        <div class="container text-center my-1 pt-1 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Ajouter lievrer</h1>

            <b class="btn btn-info">Admin</b>

        </div>
    </div>
</div>


<!-- Contact Start -->
<div class="container py-5">
    <div class="container">
        <?php if ($_SESSION['error'] != "") : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <h1>Ajouter un restaurant</h1>
            <input class="form-control w-25" type="file" required name="img" ><br>
            <input class="form-control w-25" type="text" required name="restaurant_name" placeholder="Entrez le nom du restaurant"> <br>
            
            <input class="form-control w-25" type="text" name="location" required placeholder="Localisation du restaurant"> <br>

            
            <button class="btn btn-primary" name="Ajouter" type="submit">Ajout</button>
        </form>



        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <select required name="id_restaurant" class="form-select" aria-label="Default select example">
                <option value="" selected disabled>Choisissez le restaurant</option>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM `restaurants`");
                while ($row = mysqli_fetch_assoc($select)) : ?>
                    <option value="<?= $row['id'] ?>"><?= $row['restaurant_name'] ?></option>

                <?php endwhile; ?>
            </select>
            <br>




            <input class="form-control" type="file" name="file" required>
            <br>
            <input class="form-control" type="text" name="food_name" placeholder="nom du produit" required>
            <br>
            <input class="form-control" type="number" name="food_price" placeholder="Prix ​​du produit" required>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Ajout</button>
        </form>

    </div>



    <h1>Tous les plats</h1>

    <table class="table table-light">
        <tbody>
            <tr>
                <th>Photo du plat</th>
                <th>Nom du plat</th>
                <th>Prix ​​du plat</th>
                <th>Le restaurant</th>
                <th>Supprimer</th>
            </tr>

            <?php

            $select = mysqli_query($conn, "SELECT * FROM `foods` ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($select)) {




            ?>


                <tr>
                    <td><img src="foods/<?= $row['food_img']; ?>" width="50" alt=""></td>
                    <td><?= $row['food_name']; ?></td>
                    <td><?= $row['food_price']; ?> Da</td>
                    <td><?php


                        echo $row['restaurant_name'];

                        ?></td>
                    <td><a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row['id']; ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



    </body>

    </html>