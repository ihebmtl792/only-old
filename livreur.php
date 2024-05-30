<?php


require_once "db/connection.php";

$_SESSION['error'] = "";





$get_restaurant = mysqli_query($conn, "SELECT * FROM `orders`");


if(isset($_POST['Ajouter'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if(isset($_POST['id_restaurant'])){
        $id_restaurant = $_POST['id_restaurant'];
        $select = mysqli_query($conn,"SELECT * FROM `restaurants` WHERE id = '$id_restaurant'");
        while($row = mysqli_fetch_assoc($select)){
            $name_restaurant = $row['restaurant_name'];
        }
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }

    if(isset($_POST['location'])){
        $location = $_POST['location'];
    }
    
  
    $_SESSION['error'] = "Le livreur a été ajouté";

    $add = mysqli_query($conn,"INSERT INTO `livreur`(`name_restaurant`, `id_restaurant`, `name` ,`email`,`password`, `location`) 
    VALUES ('$name_restaurant','$id_restaurant','$name','$email','$password','$location')");
    header('location:livreur.php');

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


<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
<?php include_once "db/nav.php" ;?>

    <div class="container-xxl py-5 bg-dark hero-header mb-1">
        <div class="container text-center my-1 pt-1 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Ajouter livreur</h1>

            <b class="btn btn-info">Admin</b>

        </div>
    </div>
</div>
<!-- Navbar & Hero End -->


<!-- Contact Start -->
<div class="container py-5">
    <div class="container">
        <?php if ($_SESSION['error'] != "") : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <h1>ajouter lievrer</h1>
            <select required name="id_restaurant" class="form-select w-25" aria-label="Default select example">
            <option value="" selected disabled>Choisissez le restaurant</option>
            <?php 
            $select = mysqli_query($conn,"SELECT * FROM `restaurants`");
            while($row = mysqli_fetch_assoc($select)):?>
            <option value="<?= $row['id'] ?>"><?= $row['restaurant_name'] ?></option>

            <?php endwhile; ?>
        </select>
        <br>

            <input class="form-control w-25" type="text" name="name" placeholder="le nom de lievrer"> <br>

            <select name="location" class="form-select w-25" aria-label="Default select example">
              <option selected disabled>la commune?</option>
              <option value="sidi Amar">Sidi Amar</option>
              <option value="bouni">Bouni</option>
              <option value="hadjar">Hadjar</option>
            </select>
     
            <br>
            <input class="form-control w-25" type="text" name="email" placeholder="E-mail"> <br>
            <input class="form-control w-25" type="text" name="password" placeholder="Mot de pass"> <br>

           <button class="btn btn-primary" name="Ajouter" type="submit">Ajout</button>
        </form>

        

        <br>
      


    </div>




  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



    </body>

    </html>