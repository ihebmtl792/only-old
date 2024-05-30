<?php


require_once "db/connection.php";

$_SESSION['error'] = "";


if (isset($_POST['submit'])) {

    if (isset($_POST['email'])) {
      $email = $_POST['email'];
    }
  
    if (isset($_POST['password'])) {
      $password = $_POST['password'];
    }
  
    $sql = "SELECT * FROM livreur WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['email'] === $email && $row['password'] === $password) {
       $_SESSION['location'] = $row['location'];
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "lievrer";
        header('location:home_livreur.php');
      }
    } else {
      $_SESSION['error'] = "Mot de passe ou email incorrect";
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Restaurant - Admin</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Lievrer compte</h1>

            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Contact Start -->
    <div class="container py-5">
        <div class="container">

            <div class="col-md-12">
                <div class="center container text-center my-1 pt-1 pb-4 w-50">

                <?php if ($_SESSION['error'] != "") : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error']; ?>
                                </div>
                            <?php endif; ?>
              
                    <form method="POST" action="">
                        <div class="row g-3 center container text-center my-1 pt-1 pb-4">
                       
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="E-mail">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                                    <label for="password">Mot de passe</label>
                                </div>
                            </div>



                            <h1 id="total"></h1>

                            <div class="col-12">
                                <button name="submit" name="submit" class="btn btn-dark w-100 py-3" type="submit">Se Connecter
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