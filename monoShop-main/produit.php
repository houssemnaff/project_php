<?php
/*
require("config/commandes.php");

$Produits=afficher();
*/
require "config/connexion.php";
$sql = "select * from produits";
$req = mysqli_query($con, $sql);

if(isset($_GET['pdt'])){
    
    if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
    {
        $id = $_GET['pdt'];

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
<title>mon shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<style>
.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
.bd-placeholder-img-lg {
    font-size: 3.5rem;
}
}
.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
background-color: #ff8000;
}
.text:hover{
    transform: scale(1.05);
    background-color: rgb(250, 128, 114); 
}
</style>


</head>
<body>

<header>
<div class="collapse bg-dark" id="navbarHeader">
<div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>
</div>
</header>

<main>
    <div class="album py-5 bg-light">
        <div class="container" style="display: flex; justify-content: center">
            <div class="row">
                <div class="col-md-2"></div>
                <?php while ($produit = mysqli_fetch_assoc($req)): {
                    if ($produit['id_p'] == $id) { ?>
                        <div class="col-md-8">
                            <div class="card shadow-sm">
                                <h3 align="center"><?= $produit['nom'] ?></h3>
                                <img src="<?= $produit['image'] ?>" style="width: 50%">
                                <div class="card-body">
                                    <p class="card-text"><?=substr($produit['description'],0,160 ) ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="commandes.php?idp=<?= $produit['id_p']?>"><button type="button" class="btn btn-sm btn-dark">Commander</button></a>
                                        </div>
  <div class="btn-group" width="20px">                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></div>
                                        <div class="text">
                                        <small class="text" style="font-weight: bold;"><?= $produit['prix'] ?> dt</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  }
                } ?>
                <?php endwhile; ?>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</main>

<br>
<br>
<br>
<br>
</body>
</html>
