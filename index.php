<?php 
include_once "db/connection.php";
$_SESSION['error'] = "";



if(isset($_POST['submit'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['note'])){
        $note = $_POST['note'];
        
    }
    $insert = mysqli_query($conn,"INSERT INTO `feedback`( `name`, `note`) VALUES ('$name','$note')");
    header('location:index.php');die();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Only Foods</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   
    <link href="img/favicon.ico" rel="icon">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
       
        <div class="container-xxl position-relative p-0">
        <?php include_once "db/nav.php"; ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Nous vous proposons les meilleurs restaurants
                                l</h1>
                            <a href="item.php" class="btn btn-info py-sm-3 px-sm-5 me-3 animated slideInLeft">Commandez maintenant</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/cover.png" alt="" style="border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
  


        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
               


                    
                    <?php $select = mysqli_query($conn,"SELECT * FROM `restaurants` ORDER BY location ASC");
                    while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="items.php?id=<?= $row['id'];?>">
                            <div class="service-item rounded pt-3">
                            <span class="btn-sm bg-dark"><?= $row['location']; ?></span>
                            <div class="p-4">
                                <center>
                                <img src="img/<?= $row['file']; ?>" alt="" width="150">
                                <br>
                                <h5><?= $row['restaurant_name']; ?></h5>
                             </center>
                            </div>
                        </div>

                    </a>
                    </div>

                    <?php } ?>


                </div>
            </div>
        </div>


        <div class="container py-5">
        <div class="container">

     

            <div class="col-md-12">
                <div class="center container text-center my-1 pt-1 pb-4  w-50">

                    <?php if ($_SESSION['error'] != "") : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['error']; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <h1>Envoyer des commentaires</h1>
                        <div class="row g-3 center container text-center my-1 pt-1 pb-4">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input name="name"  class="form-control" id="nom" placeholder="nom et prénom" required>
                                    <label for="name">Nom et prénom</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="note" class="form-control" id="note" placeholder="Numéro de téléphone" required>
                                    <label for="note">Commentaire</label>
                                </div>
                            </div>






                         
                            <div class="col-12">
                                <button name="submit" name="submit" class="btn btn-dark w-100 py-3" type="submit">Envoyer des commentaires
                                </button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
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
    </div>


    

        
    <footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
      <small class="d-block mb-3 text-body-secondary">© 2017–2024</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Cool stuff</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Business</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Education</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Government</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Gaming</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary text-decoration-none" href="#">Team</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
        <li><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>
     


  

    </div>

  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


  
    <script src="js/main.js"></script>
</body>

</html>