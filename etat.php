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
    if(isset($_POST['prix'])){
        $prcie = $_POST['prix'];
    }

    if(isset($_POST['location'])){
        $location = $_POST['location'];
    }
    
  
    $_SESSION['error'] = "Le livreur a été ajouté";

    $add = mysqli_query($conn,"INSERT INTO `livreur`(`name_restaurant`, `id_restaurant`, `name`, `prcie`, `location`) VALUES ('$name_restaurant','$id_restaurant','$name','$prcie','$location')");
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Etat</h1>

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

      


    <h1>Etat</h1>

    <table class="table table-light">
        <tbody>
            <tr>
               <th>Prenom</th>
               <th>E-mail</th>
               <th>Mot de pass</th>
              
               <th>La comine</th>
               <th>Le restaurant</th>
               <th>Status</th>
               <th>Supprimer</th>
              
            </tr>

            <?php 

            $select = mysqli_query($conn,"SELECT * FROM `livreur` ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($select)){
            



?>


            <tr>
                
                <td><?= $row['name'];?></td>

                <td><?= $row['email'];?></td>
                <td><?= $row['password'];?></td>
               
                <td><?php 

    
                    echo $row['location'];
                
               ?></td>

               <td><?= $row['name_restaurant'] ;?></td>
                
               <td>
                <select id="status<?= $row['id']; ?>" onchange="Status('<?= $row['id']; ?>')"  class="form-select" aria-label="Default select example">
                  <option selected>état?</option>
                  <option <?php if($row['status'] == 1 ){echo "selected";}  ?> value="1">Occupé</option>
                  <option <?php if($row['status'] == 2 ){echo "selected";}  ?> value="2">libér</option>
 
                </select>
               </td>

               <td>
                <a href="delete.php?id2=<?= $row['id'];?>" class="btn btn-danger btn-sm">Supprimer</a>
               </td>


            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function Status(link_id) {
          
            let status = $("#status" + link_id).val();
            $.ajax({
                url: "ajax/status.php",
                method: "POST",
                data: "id=" + link_id + "&status=" + status,
                success: function(res) {}
            })
            return false;

        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



    </body>

    </html>