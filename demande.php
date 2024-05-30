<?php


require_once "db/connection.php";

$_SESSION['error'] = "";

if (isset($_POST['submit'])) {

    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }

    if (isset($_POST['competences'])) {
        $competences = $_POST['competences'];
    }



    if (isset($nom) && isset($phone)  && isset($competences)  && isset($sexe)) {
        $insert = mysqli_query($conn,"INSERT INTO `requests`( `nom`, `phone`, `competences`) VALUES ('$nom','$phone','$competences')");

        if($insert){
            $_SESSION['error'] = "Votre demande a bien été envoyée, nous vous contacterons dans les plus brefs délais, merci";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Only Foods - Demande d'emploi</title>
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



</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
    <?php include_once "db/nav.php" ;?>

        <div class="container-xxl py-5 bg-dark hero-header mb-1">
            <div class="container text-center my-1 pt-1 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Demande d'emploi</h1>

            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Contact Start -->
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
                        <div class="row g-3 center container text-center my-1 pt-1 pb-4">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input name="nom" type="text" class="form-control" id="nom" placeholder="nom et prénom" required>
                                    <label for="nom">Nom et prénom</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="Numéro de téléphone" required>
                                    <label for="phone">Numéro de téléphone</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="competences" class="form-control" id="Competences" placeholder="Compétences" required>
                                    <label for="Competences">Compétences</label>
                                </div>
                            </div>



                        


                            <h1 id="total"></h1>

                            <div class="col-12">
                                <button name="submit" name="submit" class="btn btn-dark w-100 py-3" type="submit">Envoyer une demande
                                </button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>


        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>