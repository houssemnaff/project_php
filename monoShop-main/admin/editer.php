<?php
require "../config/connexion.php";
require "../config/commandes.php";
/*
session_start();

require("../config/commandes.php");

if(!isset($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(empty($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(!isset($_GET['id'])){
    header("Location: editer.php");
}

if(empty($_GET['id']) || is_numeric($_GET['id'])){
    header("Location: editer.php");
}
*/
if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) or is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $sql="select * from produits where id_p='$id'";
        $req = mysqli_query($con, $sql);
        //$produit=mysqli_fetch_assoc($req);
    }
}



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

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
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
            <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="supprimer.php">Suppression</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active" style="font-weight: bold; color: green" href="" >Modification</a>
            </li>
            
        </ul>
        <div style="margin-right: 500px">
        <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
        </div>
        <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="destroy.php">Se deconnecter</a>
        </div>
    </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?php while ($produit=mysqli_fetch_assoc($req)): ?>
        
    <form method="post">
    <div class="image-container">
            <img src="<?= $produit['image'] ?>" alt="Image du produit" style="width: 15%">
        </div>
    <div class="mb-3">
    
        <label for="image" class="form-label">L'image du produit</label>
        <input type="text" class="form-control" name="image" value="<?= $produit['image'] ?>" required>

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" name="nom" value="<?= $produit['nom'] ?>"  required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" value="<?= $produit['prix'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">quantite</label>
        <input type="number" class="form-control" name="qte" value="<?=  $produit['qte'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" value="<?= $produit['description'] ?>"  required>
        
    </div>
    
   
    <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
    
    </form>

    <?php endwhile; ?>

</div>
</div></div>

    
</body>
</html>

<?php

    if(isset($_POST['valider']))
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
        {
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
            {
                $image = $_POST['image'];
                $nom = $_POST['nom'];
              $prix = $_POST['prix'];
                $desc = $_POST['desc'];
                $qte = $_POST['qte'];
              // echo"le url de l image". $nom .$image. $prix . $desc .$qte;
            $r=modifier($image, $nom, $prix, $desc, $id,$qte);
          
               if($r){
                header('Location: afficher.php');
               }else{
                echo "le produit n'est pas modifier";
               }
                
                
               
                
            }
            

        }
    }
    

?>