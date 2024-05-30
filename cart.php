<?php
require_once "db/connection.php";
$_SESSION['error'] = "";

$_SESSION['ok'] = "";
if (isset($_SESSION['cart'])) {

  $x = $_SESSION['cart'];
  $count = count($_SESSION['cart']);
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

  if (isset($_POST['food_price'])) {
    $food_price = $_POST['food_price'];
  }
  if (isset($_POST['food_name'])) {
    $food_name = $_POST['food_name'];
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
  $order_number = mt_rand(99999, 999999);
  if (isset($_POST['food_img'])) {
    $food_img = $_POST['food_img'];
  }


  if(isset($_POST['total'])){
    $total = $_POST['total']+$_SESSION['prcie'];
    
  }
 
  

    $select = $_SESSION['prcie'];


    if(isset($_POST['food_price'])){
      $food_price = $_POST['food_price'];
    }
  
    $email_livreur = $_SESSION['email_livreur'];

    foreach ($food_img as $key => $value) {
      $_SESSION['ok'] = "Demande envoyée ";
      $update = mysqli_query($conn,"UPDATE `livreur` SET `status`='1' WHERE email = '$email_livreur'");
      $insert = mysqli_query($conn, "INSERT INTO `orders`( `name`, `phone`, `adresse`, `food_name`, `food_img` ,`food_price`,`livraison`,`order_number`) VALUES
       ('$name','$phone','$adresse','$food_name[$key]','$food_img[$key]','$food_price[$key]','$id_livreur','$order_number')");
      $_SESSION['ok'] = "Votre demande a été soumise et vous parviendra dans les plus brefs délais. Merci";
      header('location:success.php');
    }
  
}




?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="css/bootstrap.min.css" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet">


  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <title>Super Market</title>

</head>

<body>

  <div class="container-xxl position-relative p-0">
    <?php include_once "db/nav.php"; ?>


  </div>
  <main class="main">




    <section class="cart section--lg container mt-5">
      <form action="" method="POST" class="form grid">
        <div class="table-container" id="cart">
          <div class="table-container">
          <table class="table table-hover table-bordered">
                        <thead>
                          <th>Image</th>
                          <th>Nom</th>
                          <th>Prix</th>
                          <th>Claire</th>
                          <th>Quantité</th>

                        </thead>
                        <tbody>
                          <?php
                          //initialize total
                          $total = 0;
                          if (!empty($_SESSION['cart'])) {
                            //connection

                            //create array of initail qty which is 1
                            $index = 0;
                            if (!isset($_SESSION['qty_array'])) {
                              $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                            }
                            $sql = "SELECT * FROM foods WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";




                            $x = implode(',', $_SESSION['cart']);

                            $select = mysqli_query($conn, "SELECT * FROM `foods` WHERE id in (',',$x)");

                            $total = mysqli_query($conn, "SELECT SUM(food_price) as total FROM `foods` WHERE id in (',',$x)");
                            foreach ($total as $t) {
                              $total =  $t['total'];
                            }
                            foreach ($select as $row) {



                          ?>
                       
                                <tr>
                                  <td>


                                    <img id="img" name="img[]" src="foods/<?= $row['food_img']; ?>" width="50" alt="">

                        
                                    <input id="getTotal" class="price" type="hidden" name="food_price[]" value="<?= $row['food_price'] ?>">
                                    <input type="hidden" name="food_name[]" value="<?= $row['food_name']; ?>">
                                    <input type="hidden" name="food_img[]" value="<?= $row['food_img']; ?>">


                                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">

                                  </td>
                                  <td><?= ucfirst($row['food_name']); ?></td>



                                  </td>






                                  <td><?= $row['food_price']; ?> Da</td>
                                  <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">



                                  <td> <a href="clear.php?id=<?= $row['id']; ?>" class="remove text-danger" title="Effacer l'article"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                      </svg></a></td>







                                  <td>
                                    <div class="input-group w-50">
                                      <button type="button" class="btn btn-sm btn-secondary minus-btn" style="font-size: 1.3rem; width: 40px;">-</button>
                                      <input class="form-control text-center qtyInput" id="quantite" type="number" name="quantite[]" value="1">
                                      <button type="button" class="btn btn-sm btn-secondary add-btn" style="font-size: 1.3rem; width: 40px;">+</button>
                                    </div>
                                  </td>

                                  

                              </form>

                              </tr>

                            <?php
                              $index++;
                            }
                          } else {
                            ?>
                            <tr>
                              <td colspan="4" class="text-center">Aucun article</td>
                            </tr>
                          <?php
                          }

                          ?>
                          <tr>

                        </tbody>
                      </table>

            <?php if ($_SESSION['ok'] != "") : ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['ok']; ?>
              </div>
            <?php endif; ?>


            <?php if ($_SESSION['error'] != "") : ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; ?>

              </div>
            <?php endif; ?>

       

          </div>
        </div>
        <div class="cart_actions mt-5">
          <button onclick="history.back()" type="button" class="btn btn-md btn-dark">Return</button>
          <a href="clear.php" id="clear" type="button" class="btn btn-md btn-info">Vider le panier</a>
   

        </div>




        <?php if (!empty($_SESSION['cart'])) : ?>


          </div>
          <div class="col-md-6">
            <div class="wow fadeInUp">
        
                <?php if ($_SESSION['error'] != "") : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']; ?>
                  </div>
                <?php endif; ?>
                <div class="row g-3">


                  <div>



                  </div>




                  <div class="col-md-6">
                    <div class="form-floating">
                      <input required type="text" name="name" class="form-control" id="name" placeholder="le nom complet">
                      <label for="name">le nom complet</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input required name="phone" type="number" class="form-control" id="email" placeholder="Numéro de téléphone">
                      <label for="email">Numéro de téléphone</label>
                    </div>
                  </div>
               

                  <div class="col-12">
                  <select required name="adresse" id="adresse" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="sidi amar">Sidi amar </option>
                    <option value="barahal">Barahal</option>
                    <option value="bouni">Bouni</option>
                    <option value="annaba">Annaba</option>
                    <option value="seraidi">Seraidi</option>
                  </select>
                  </div>



                  <h3 class="" id="setTotal">le total: <span id="total"></span></h3>

                  <input type="hidden" name="total" id="gettotal" >



                 



                  <h5 >Prix ​​de livraison : <span id="ship"> </span>Da</h5>


                


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

          <script src="js/jquery.js"></script>
          <script>
            $(document).ready(function() {
              $('#adresse').change(function() {
                let adresse = $("#adresse").val();
                let setTotal = $("#gettotal").val();
                if (adresse != "") {
                  $.ajax({
                    url: "ajax/ship.php",
                    type: "POST",
                    data: {
                      adresse: adresse,
                      setTotal:setTotal,
                    },
                    cache: false,
                    success: function(response) {
                      var splitted = response.split("|");
                   
                      $("#total").html(splitted[1]);
                      $("#ship").html(splitted[0]);



                    }
                  })
                }


              })


            })
          </script>

          </div>

        <?php endif; ?>




    </section>

    <script>
      const qtyInputs = document.querySelectorAll('.qtyInput');
      const minusBtns = document.querySelectorAll('.minus-btn');
      const addBtns = document.querySelectorAll('.add-btn');
      const priceInputs = document.querySelectorAll('.price');

      const totalEl = document.querySelector('#total');
      const saveBtn = document.querySelector('#save');
      const clearCartBtn = document.querySelector('#clear');

      let totalPrice = 0;

      // Load saved values on page load
      window.addEventListener('DOMContentLoaded', () => {
        loadValues();
        updateTotal();
      });

      for (let index = 0; index < qtyInputs.length; index++) {
        const qtyInput = qtyInputs[index];
        const addBtn = addBtns[index];
        const minusBtn = minusBtns[index];
        const priceInput = priceInputs[index];

        let qty, price;

        addBtn.addEventListener('click', (e) => {
          qty = Number(qtyInput.value);
          price = Number(priceInput.value);
          qtyInput.value = qty + 1;
          updateTotal();
          saveValues();
        });

        minusBtn.addEventListener('click', (e) => {
          qty = Number(qtyInput.value);
          if (qty > 1) {
            qtyInput.value = qty - 1;
            updateTotal();
            saveValues();
          }
        });

        qtyInput.addEventListener('input', () => {
          updateTotal();
          saveValues();
        });
      }

      function updateTotal() {
        let sum = 0;
        for (let i = 0; i < qtyInputs.length; i++) {
          const qty = Number(qtyInputs[i].value);
          const price = Number(priceInputs[i].value);
          sum += qty * price;

         
         
        }
        totalEl.innerText = sum;
        document.getElementById('gettotal').value =  totalEl.innerText = sum;

        <?php $_SESSION['to'] = 'totalEl.innerText = sum;' ?> ;

        

      }

      function saveValues() {
        const values = [];
        for (let i = 0; i < qtyInputs.length; i++) {
          values.push({
            qty: qtyInputs[i].value,
            price: priceInputs[i].value
          });
        }
        localStorage.setItem('cartValues', JSON.stringify(values));
      }

      function clearSave() {
        localStorage.removeItem('cartValues');
      }

      function loadValues() {
        const savedValues = localStorage.getItem('cartValues');
        if (savedValues) {
          const values = JSON.parse(savedValues);
          // console.log('Retrieved values:', values); // Debugging line
          if (Array.isArray(values) && values.length === qtyInputs.length) {
            for (let i = 0; i < qtyInputs.length; i++) {
              qtyInputs[i].value = values[i].qty; // Assuming price doesn't change, so no need to update price input
            }
          } else {
            // console.error('Saved values have unexpected structure.');
          }
        }
      }


      // Save Cart Values
      saveBtn.addEventListener('click', (e) => {
        e.preventDefault();
        saveValues();
        alert('Saved!'); //Show saved alert here
      });

      // Clear Cart
      clearCartBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        await clearSave(); //clear localstorage
        await (window.location.href = 'clear.php'); //then redirect to clear.php
      });
    </script>




  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



  <script src="js/main.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


  <style>
    #img:hover {
      transition: 0.6s;
      transform: scale(1.8);
    }
  </style>

  <script src="assets/js/main.js"></script>
</body>

</html>