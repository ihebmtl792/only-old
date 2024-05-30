<?php

require_once "../db/connection.php";
if(isset($_POST['adresse']) && isset($_POST['setTotal'])){
    $setTotal = $_POST['setTotal'];
    $adresse = $_POST['adresse'];
    $select = mysqli_query($conn,"SELECT * FROM `livreur` WHERE  location = '$adresse' AND status != 1 LIMIT 1");
    while($row = mysqli_fetch_assoc($select)){
            $price = $row['prcie'];
            $_SESSION['prcie'] = $row['prcie'];
            $_SESSION['email_livreur'] = $row['email'];
    }
      
        $rand = mt_rand(40,200);
        echo $rand ." | ". $rand+$setTotal. " Da";
  

     
        

    
    
 


    

                          

}

?>