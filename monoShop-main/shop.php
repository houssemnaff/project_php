<?php
require "config/connexion.php";

$sql = "select * from produits ";
$req = mysqli_query($con, $sql);
if(isset($_GET['search']) ){
 if(is_numeric($_GET['rechercher'])){
  $prix = $_GET['rechercher'];
 }
 
  //$nom = $_GET['nomp'];
  //
  if($prix!="" ){
    $sql = "select * from produits where prix <= $prix   ";
   //$sql = "select * from produits where nom like '%$prix%' ";
    $req=mysqli_query($con,$sql);
  }else{
   echo "no produits";
  
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>mon-shop</title>
<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
  <body>
    
<header>
  <style>
    .card:hover {
      background-color:#c0c0c0;
      border: solid black 3px;
      /* background-color: #ff8000;  */
    }
  </style>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Sign in</h4>
          <ul class="list-unstyled">
            <li><a href="login.php" class="text-white">Se connecter</a></li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong style="color: #ff8000;">Mono</strong><strong >Shop</strong>
      </a>


      <form class="d-flex ms-auto my-2 my-lg-0">
    <input class="form-control me-2" type="search" placeholder="Rechercher" name="rechercher" aria-label="Search">
    <button class="btn btn-outline" name="search" type="submit" style=" background-color: #ff8000;">Rechercher</button>
  </form>
  <div class="rows">
  <div class="col-8"><li ><a href="client/profil.php"class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="300" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></a></li></div>
<div class="col-8"><li><a href="client/panier.php" >
<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ff8000" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
</a></li></div>

</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </div>
  

</header>


<script>
  function updateValue(value) {
    document.getElementById('selectedPrice').innerText = value;
    document.getElementById('price').setAttribute('value', value);
  }
  
  
</script>
<script>
  // Function to display the success message for a specified duration
  function displaySuccessMessage(message, duration) {
    var alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-success';
    alertDiv.innerHTML = message;

    document.body.appendChild(alertDiv);

    // Hide the message after the specified duration (in milliseconds)
    setTimeout(function() {alertDiv.style.display = 'none';}, duration);
  }

  // Check if the success message session variable exists
  <?php
  session_start();
  if (isset($_SESSION['success_message'])) {
    echo "displaySuccessMessage(". $_SESSION['success_message'] . ", 4000);"; // 4000 milliseconds (4 seconds)
    // Clear the session variable to avoid displaying the message again on refresh
   // unset($_SESSION['success_message']);
  }
  ?>
</script>





<div class="container-xxl bd-gutter mt- my-md-4 bd-layou row-cols- ">

<aside class="bd-sidebar album py-4">
<div class="offcanvas-lg offcanvas-start  row-cols-2 row-cols-sm-2 row-cols-md-2 g-4">

<form method="get" name="f">
<label for="product">Choisissez un produit :</label>

<select  name="nomp" id="price"style="color:white;background:black;">
<?php 
$sql1 = "select * from produits ";
$req1 = mysqli_query($con, $sql1); while ($produit = mysqli_fetch_assoc($req1)) : ?>
<option value="<?=$produit['nom'] ?> "style="background:white;color:black" ><?=$produit['nom'] ?></option>

<?php endwhile; 
if (isset($_GEt['submit'])){
  $prix=$_GET['price'];
  $nom=$_POST['nomp'];
  echo "jhjhjhjhjhj".$nom ;
}?>

</select>


<label for="price">Choisissez un prix :</label>
<input type="range" id="price" name="price" min="0" max="10000" step="1" value="50" oninput="updateValue(this.value)">
<strong><button id="selectedPrice" name="prix" style="color:white;background:black;">0</button></strong><br>
<button type="submit" name="submit" class="btn btn-dark" style="background:#ff8000;">Soumettre</button>
</form>

</div>
</aside>


























<main class="bd-main order-2" >

  <div class="album py-4 bg-light">
    <div class="container">
      <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
        
      <?php  while ($produit = mysqli_fetch_assoc($req)) : ?>
          <div class="col">
            <div class="card shadow-sm">
              <h3><?= $produit['nom'] ?></h3>
              <div class="d-flex justify-content-center">
              <img src="<?= $produit['image'] ?>" style="width: 40%">
              </div>
             
              <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="produit.php?pdt=<?= $produit['id_p'] ?>"><button type="button" class="btn btn-sm btn-dark" /*style="background:#fd7e00";*/>Voir plus</button></a>
                  </div>
                  <small class="text" style="font-weight: bold;"><?= $produit['prix'] ?> dt</small>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>

      </div>
    </div>
  </div>
  
</main>
</div>


<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
          
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
             
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
</body>
</html>