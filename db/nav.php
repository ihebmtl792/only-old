<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="index.php">ONLY FOODS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Accueil</a>
        </li>
        
   

        <?php if(!isset($_SESSION['email'])):?>
        
        
        <li class="nav-item">
          <a href="login.php" class="nav-link text-light">Admin</a>
        </li>


 
        <li class="nav-item">
          <a href="cart.php" class="nav-link text-light">Le Panier</a>
        </li>

        <li class="nav-item">
          <a href="demande.php" class="nav-link text-light">Demande d'emploi</a>
        </li>

       




        <?php endif; ?>



        <li class="nav-item">
          <a href="cart.php" class="nav-link text-light">Le Panier</a>
        </li>

        <?php if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@gmail.com'){?>
          <li class="nav-item">
          <a href="livreur.php" class="nav-link text-light">lievrer</a>
        </li>

      


        

        <li class="nav-item">
          <a href="etat.php" class="nav-link text-light">l'état</a>
        </li>

        <li class="nav-item">
          <a href="add.php" class="nav-link text-light">Ajouter un plat</a>
        </li>

     

        
          <?php }else{

          } ?>

<li class="nav-item">
          <a href="livreur_login.php" class="nav-link text-light">Lievrer compte</a>
        </li>

      </ul>
      <form class="d-flex">
      <?php if(isset($_SESSION['email'])){?>

        <?php 

if(isset($_SESSION['role']) && $_SESSION['role'] == "lievrer"){
  echo '  <a href="home_livreur.php" class="nav-link text-light">Accueil livreur</a>';
}

?>


<?php 

if(!isset($_SESSION['role'])){
  echo '<a href="home.php" class="nav-link text-light">Accueil Admin</a>';
}

?>


       
        


      <a class="btn btn-danger btn-sm" href="logout.php">Déconnexion</a>
      <?php } ?>
      </form>
    </div>
  </div>
</nav>
