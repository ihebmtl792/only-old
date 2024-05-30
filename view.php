<?php


require_once "db/connection.php";

$_SESSION['error'] = "";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_restaurant = mysqli_query($conn, "SELECT * FROM `foods` WHERE id ='$id'");

    while ($row = mysqli_fetch_assoc($get_restaurant)) {
        $food_name = $row['food_name'];
        $id_restaurant = $row['id_restaurant'];

        $food_price = $row['food_price'];

        $_SESSION['food_price'] = $food_price;
    }


    if (isset($_POST['submit'])) {

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        if (strlen($_POST['name']) < 5) {

            $_SESSION['error'] = "S'il vous plaît entrez votre nom";
        }



        if (isset($_POST['food_img'])) {
            $food_img = $_POST['food_img'];
        }

        if (isset($_POST['select'])) {
            $select = $_POST['select'];
        }



        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }

        if (strlen($_POST['phone']) < 8) {

            $_SESSION['error'] = "Veuillez entrer le numéro de téléphone";
        }



        if (isset($_POST['adresse'])) {
            $adresse = $_POST['adresse'];
        }

        if (strlen($_POST['adresse']) < 5) {

            $_SESSION['error'] = "Veuillez entrer l'adresse";
        }

        if ($_SESSION['error'] == "") {

            while ($row = mysqli_fetch_assoc($get_restaurant)) {
                $food_name = $row['food_name'];

                $food_price = $row['food_price'] + $_SESSION['price'];
                $id_restaurant = $row['id_restaurant'];

                $food_img = $row['food_img'];
            }
            $total = $_SESSION['total'];
            $id_livreur = $_SESSION['id_livreur'];
            $insert = mysqli_query($conn, "INSERT INTO `orders`( `name`, `phone`, `adresse`, `food_name`, `food_img` ,`food_price`,`id_restaurant`,`livraison`) VALUES ('$name','$phone','$adresse','$food_name','$food_img','$total','$id_restaurant','$id_livreur')");
            $update = mysqli_query($conn, "UPDATE `livreur` SET `status`= 1 WHERE id = '$id'");
            header('location:success.php');
            die();
        }
    }









?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Only foods - <?= $food_name; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <script src="js/jquery.js"></script>

    </head>

    <body>
        <div class="container-xxl bg-white p-0">
            <!-- Spinner Start -->

        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php include_once "db/nav.php"; ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-1">
                <div class="container text-center my-1 pt-1 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $food_name; ?></h1>

                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                    <h1 class="mb-5">Commandez maintenant</h1>


                </div>
                <div class="row g-4">
                    <div class="col-12">


                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">

                        <?php
                        $get_foods = mysqli_query($conn, "SELECT * FROM `foods` WHERE id ='$id' LIMIT 1");

                        while ($food = mysqli_fetch_assoc($get_foods)) {

                            $food_img = $food['food_img'];
                            $food_price = $_SESSION['food_price'];

                        ?>


                            <img src="foods/<?= $food['food_img'] ?>" alt="" width="450">
                    </div>
                <?php } ?>
                <div class="col-md-6">
                    <div class="wow fadeInUp">
                        <form method="POST" action="">
                            <?php if ($_SESSION['error'] != "") : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error']; ?>
                                </div>
                            <?php endif; ?>
                            <div class="row g-3">


                                <div>



                                </div>

                                <input type="hidden" name="food_img" value="<?= $food_img; ?>">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="le nom complet">
                                        <label for="name">le nom complet</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="phone" type="number" class="form-control" id="email" placeholder="Numéro de téléphone">
                                        <label for="email">Numéro de téléphone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="l'adresse">
                                        <label for="adresse">Adresse</label>
                                    </div>
                                </div>
                         



                                <h5>Prix ​​de livraison : <span id="ship"></span></h5>



                                <h5>Prix ​​du plat : <?= $food_price; ?> Da</h5>




                                <h3 id="total"></h3>



                                <div class="col-12">
                                    <button name="submit" class="btn btn-dark w-100 py-3" type="submit">Commandez maintenant
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

        </div>

        <script>
            $(document).ready(function() {
                $('#adresse').keyup(function() {
                    let adresse = $("#adresse").val();
                    if (adresse != "") {
                        $.ajax({
                            url: "ajax/ship.php",
                            type: "POST",
                            data: {
                                adresse: adresse,},
                            cache: false,
                            success: function(response) {
                                var splitted = response.split("|");
                                $("#ship").html(splitted[0]);
                                $("#total").html(splitted[1]);




                            }
                        })
                    }


                })


            })
        </script>

    </body>

    </html>



<?php } ?>