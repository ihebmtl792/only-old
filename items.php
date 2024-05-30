<?php


require_once "db/connection.php";



if(isset($_GET['id'])){
    $id = $_GET['id'];

    $_SESSION['id_restaurant'] = $id;
 
    $get_restaurant = mysqli_query($conn, "SELECT * FROM `foods` WHERE id_restaurant = '$id'");

    
}
    while ($row = mysqli_fetch_assoc($get_restaurant)) {
        $name_restaurant = $row['restaurant_name'];
    
    }






?>


    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
      
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

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-xxl bg-white p-0">
            <!-- Spinner Start -->

            <!-- Spinner End -->


            <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0">
            <?php include_once "db/nav.php" ;?>

               
            </div>
            <!-- Navbar & Hero End -->


            <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container">

                    <div class="col-12">
                        <div class="form-floating">
                            <input type="search" name="search" class="form-control" id="search" placeholder="search">
                            <label for="search">Search</label>
                        </div>
                    </div>

                    <br>
                    <script src="js/jquery.js"></script>
                    <script>
                    

                        function fill(Value) {

                

                            $('#search').val(Value);

              

                            $('#display').hide();

                        }
                        $(document).ready(function() {
                            $("#search").keyup(function() {
                                var search = $('#search').val();
                              


                                if (search == "") {
                                    window.location ="item.php";

                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/search.php",
                                        data: {
                                            search: search
                                        },
                                        success: function(html) {
                                            $("#display").html(html).show();
                                        }
                                    });
                                }
                            });
                        });
                    </script>



                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                        <h1 class="mb-5">Choisissez les meilleurs aliments</h1>
                    </div>
                    <div class="row g-4" id="display">

                        <?php
                        $get_foods = mysqli_query($conn, "SELECT * FROM `foods`  WHERE id_restaurant = '$id'");

                        while ($food = mysqli_fetch_assoc($get_foods)) {




                        ?>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


                                <div class="service-item rounded pt-3">

                                    <b class="btn btn-info"> <?= $food['food_name']; ?></b>
                                    <div class="p-4">

                                        <a href="add_to_cart.php?id=<?= $food['id'];?>">

                                            <center>

                                                <img width="150" src="foods/<?= $food['food_img']; ?>" alt="">
                                                <h5><?= ucfirst($food['food_name']); ?></h5>

                                                <button type="button" class="btn btn-info btn-sm"><?= $food['food_price']; ?> Da</button>

                                                <br>
                                                <br>
                                                <a href="add_to_cart.php?id=<?= $food['id'];?>" class="action_btn cart_btn" aria-label="Ajouter au panier">
                                                <img class="" src="img/cart.png" width="40" alt="">
                                                
                                            </a>
                                                <br>
                                                 <br>
                                                <a href="add_to_cart.php?id=<?= $food['id'];?>" type="button" class="btn btn-dark btn-sm">Ajouter au panier</a>
                                            </center>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
            <!-- Service End -->

            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">Commentaires</h2>

                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="img/user1.jpg" alt="..." />
                                <h5 class="fw-bolder">Sara</h5>
                                <div class="fst-italic text-muted">Only Foods est un restaurant fantastique ! La nourriture était délicieuse, le service impeccable et l'ambiance accueillante. J'ai eu une merveilleuse expérience culinaire et j'y retournerai certainement. Merci, que des aliments, pour un repas mémorable !</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="img/user2.jpg" alt="..." />
                                <h5 class="fw-bolder">Farid</h5>
                                <div class="fst-italic text-muted">Only Foods est un restaurant fantastique ! La nourriture était délicieuse, le service impeccable et l'ambiance accueillante. J'ai eu une merveilleuse expérience culinaire et j'y retournerai certainement. Merci, que des aliments, pour un repas mémorable !</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="img/user3.jpg" alt="..." />
                                <h5 class="fw-bolder">Youcef</h5>
                                <div class="fst-italic text-muted">Only Foods est fantastique ! La nourriture était délicieuse, le service impeccable et l'ambiance était délicieuse. J'ai eu une merveilleuse expérience culinaire et j'y retournerai certainement. Merci, Only Foods, pour votre grande hospitalité !</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="img/user4.jpg" alt="..." />
                                <h5 class="fw-bolder">Amira</h5>
                                <div class="fst-italic text-muted">Only Foods est le meilleur restaurant que je connaisse ! Leur nourriture est absolument délicieuse et le service est exceptionnel. Le personnel est sympathique et attentionné, rendant chaque expérience culinaire agréable. Merci, Only Foods, d'avoir proposé un si merveilleux voyage culinaire !</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>



    </body>

    </html>

