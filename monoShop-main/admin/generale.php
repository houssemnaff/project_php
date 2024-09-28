<?php
require "../config/connexion.php";
session_start();

if(!isset($_SESSION['adminuser']))
{
    header("Location: ../login.php");
}

if(!empty($_SESSION['adminuser']))
{
  $nom = $_SESSION['adminuser']['pseudo'];
  $email = $_SESSION['adminuser']['email']; 
}
$sql = "select count(*) as number from clients";
$req = mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($req);
$usernumber=$data['number'];
$sql1 = "select count(*) as number from produits";
$req1 = mysqli_query($con, $sql1);
$data1=mysqli_fetch_assoc($req1);
$numberproduits=$data1['number'];
$sql2 = "select count(*) as number from commandes";
$req2 = mysqli_query($con, $sql2);
$data2=mysqli_fetch_assoc($req2);
$numbercommandes=$data2['number'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="UTF-8">
  <title>Card Number Display</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      width: 300px;
      margin: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-body {
      text-align: center;
    }
    .card-title {
      font-size: 2rem;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="../">MonoShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../admin/afficher.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="generale.php">generale</a>
        </li>
        
      </ul>
      <div style="margin-right: 500px">
        <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
      </div>
      
      <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="../index.php">Se deconnecter</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Votre structure de cartes -->
            <div class="card-deck">
                <a href="user.php">
                <div class="card">
                    <div class="card-body">
                        <h2 class='card-title'><?php echo $usernumber; ?></h2>
                        <p>This is the number of clients</p>
                    </div>
                </div>
                </a>
                <div class="card">
                    <div class="card-body">
                        <h2 class='card-title'><?php echo $numberproduits; ?></h2>
                        <p>This is the number of products</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class='card-title'><?php echo $numbercommandes; ?></h2>
                        <p>This is the number of orders</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Votre div aside -->
            <div class="aside">
           
                
            </div>
        </div>
    </div>
</div>


</body>
</html>
