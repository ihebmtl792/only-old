<?php


require_once "db/connection.php";

$_SESSION['error'] = "";





  $get_restaurant = mysqli_query($conn,"SELECT * FROM `orders` ");




   


  



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
    <?php include_once "db/nav.php"; ?>

        <div class="container-xxl py-5 bg-dark hero-header mb-1">
            <div class="container text-center my-1 pt-1 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Tableaux de bord</h1>

                <b class="btn btn-info">ADMIN</b> 

            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Contact Start -->
    <div class="container py-5">
        <div class="container">
<h1>Demandes</h1>
<a href="ajax/all_admin.php" type="button" class="btn btn-danger">Supprimer Tout</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Supprimer</th>
              <th scope="col">nom et prénom</th>
              <th scope="col">numéro de téléphone</th>
              <th scope="col">l'adresse</th>

              <th scope="col">Nom du plat</th>
              <th scope="col">Total Prix</th>
              
              <th scope="col">image</th>

            </tr>
          </thead>
          <tbody>

          <?php

$i = 0;
while($row = mysqli_fetch_assoc($get_restaurant )){
        
$i += 1;
    

?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <th scope="row"><a class="btn btn-sm btn-danger" href="ajax/supprimer.php?id=<?= $row['id'];?>">Supprimer</a></th>
              <td><?= $row['name']; ?></td>
              <td><?= $row['phone']; ?></td>
              <td><?= $row['adresse']; ?></td>
              <td><?= $row['food_name']; ?></td>
              <td><?= $row['food_price']; ?> Da</td>
             
              <td><img src="foods/<?=$row['food_img'];?>" alt="" width="50"></td>
            </tr>
            <?php } ?>
           
          </tbody>
        </table>


        </div>


        <hr>
        <h1>Demandes d'emploi</h1>

        <table class="table">
          <tbody>
          <tr>
            <th>#</th>
              <th scope="col">nom et prénom</th>
              <th scope="col">Numéro de téléphone</th>
              <th scope="col">Compétences</th>
              <th scope="col">Sexe</th>
            </tr>
            <?php
  $demandes = mysqli_query($conn,"SELECT * FROM `requests`");
$i = 0;
while($row = mysqli_fetch_assoc($demandes )){
        
$i += 1;
    

?>
            <tr>
            <td><?= $i; ?></td>
              <td><?= $row['nom']; ?></td>
              <td><?= $row['phone']; ?></td>
              <td><?= $row['competences']; ?></td>
              <td><?php if($row['sexe'] == 1){echo "Mâle";} else {
               echo "Femelle";
              } ?></td>
              
            </tr>
            <?php } ?>
          </tbody>
        </table>


        <h1>Commentaires</h1>

        <table class="table">
          <thead>
            <tr>
          
              <th scope="col">nom et prénom</th>
              <th scope="col">Commentaire</th>
         

            </tr>
          </thead>
          <tbody>

          <?php
  $select = mysqli_query($conn,"SELECT * FROM `feedback`");
$i = 0;
while($row = mysqli_fetch_assoc($select )){
        
$i += 1;
    

?>
            <tr>
       
              <td><?= $row['name']; ?></td>
              <td><?= $row['note']; ?></td>
      
           
             
            </tr>
            <?php } ?>
           
          </tbody>
        </table>
    </div>

    

    </div>


    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>

