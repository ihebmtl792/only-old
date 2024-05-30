<?php


require_once "db/connection.php";

$_SESSION['error'] = "";



$adresse = $_SESSION['location'];

$get_restaurant = mysqli_query($conn, "SELECT * FROM `orders` WHERE adresse = '$adresse'");






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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Liste de commandes</h1>

         

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

      


    <h1>Liste de commandes</h1>

    <a href="ajax/all.php" type="button" class="btn btn-danger">Supprimer Tout</a>

    <table class="table table-light">
        <tbody>
            <tr>
                <th>Supprimer</th>
                <th>food image</th>
               <th>Nom et surnom</th>
               <th>Téléphone</th>
               <th>Adresse</th>
               <th>Nom</th>
               <th>Prix</th>
               <th>Satuts</th>
              
            </tr>

            <?php 

            $select = mysqli_query($conn,"SELECT * FROM `orders`");
            while($row = mysqli_fetch_assoc($select)){
            



?>


            <tr>
                <th><a class="btn btn-danger btn-sm" href="ajax/supprimer.php?idu=<?= $row['id'];?>">Supprimer</a></th>
                <td><img src="foods/<?= $row['food_img'];?>" width="50" alt=""></td>
                <td><?= $row['name'];?></td>
                <td><?= $row['phone'];?></td>
                <td><?= $row['adresse'];?></td>
                <td><?= $row['food_name'];?></td>
                <td><?= $row['food_price'];?></td>

              

    
                
               <td>
                <select id="status<?= $row['id']; ?>" onchange="Status('<?= $row['id']; ?>')"  class="form-select" aria-label="Default select example">
                  <option selected>état?</option>
                  <option <?php if($row['status'] == 1 ){echo "selected";}  ?> value="1">Occupé</option>
                  <option <?php if($row['status'] == 2 ){echo "selected";}  ?> value="2">libér</option>
 
                </select>
               </td>


            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function Status(link_id) {
          
            let status = $("#status" + link_id).val();
            $.ajax({
                url: "ajax/status2.php",
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