
<?php
require "config/connexion.php";
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: inscription.php");
}else{
  $user=$_SESSION['user'];
  $id_c=$user['id_c'];
}
if(isset($_GET['idp'])){
  if(!empty($_GET['idp']) ) {
      $id_p =$_GET['idp'];
  } else {
      echo "Erreur avec l'ID du produit.";
  }
}
$sql1="select prix from produits where id_p='$id_p'";
$req1=mysqli_query($con,$sql1);
$prix=mysqli_fetch_assoc($req1);
$prix=$prix['prix'];

$date = date('Y-m-d');
if(isset($_POST['achets'])){

  if(!empty($_POST['qte'])) {
      $qte = $_POST['qte'];
      
      $date = date('Y-m-d'); // Obtenez la date actuelle au format YYYY-MM-DD

      // Utilisation de requêtes préparées pour sécuriser la requête SQL
      $sql = "INSERT INTO commandes (id_c, id_p, prix, qte, date_com) VALUES (?, ?, ?, ?, ?)";
      
      $stmt = mysqli_prepare($con, $sql);

      // Liaison des paramètres et exécution de la requête
      mysqli_stmt_bind_param($stmt, 'iiids', $id_c, $id_p, $prix, $qte, $date);
      $result = mysqli_stmt_execute($stmt);

      if ($result) {
          echo "Commande insérée avec succès.";
      } else {
          echo "Erreur lors de l'insertion de la commande : " . mysqli_error($con);
      }

      mysqli_stmt_close($stmt); // Fermeture de la requête préparée
  } else {
      echo "La quantité est vide.";
  
}
}


  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>



<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
     
      </form>
    </div>
  </div>
 <!-- <div class="vol-25">
    <div class="container"></div>
    <label for="qte">donner le qtr</label>
    <input type="number" name="qte" id="qte">
  </div>-->
  <div class="col-25">
    <div class="container">
      <form method="post">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <label for="qte">donner le qte</label>
    <input type="number" name="qte" id="qte">
    <input type="submit" value="achets" class="btn" name="achets">
    </form>
    </div>
  </div>
</div>

</body>
</html>
