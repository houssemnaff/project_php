<?php
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
          <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="generale.php">generale</a>
        </li>
        
      </ul>
      <div style="margin-right: 500px">
        <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
      </div>
      
      <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="../index.php">Se deconnecter</a>
    </div>
  </div>
</nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      
<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
  
    <label>UploadImage :</label>
		<input type="file" name='file'>
		<!--<input type="submit" name="upload" value="Envoyer"><br>-->
    <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
    <input type="name" class="form-control" name="image" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom"  required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">quantite</label>
    <input type="number" class="form-control" name="qte" required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" required></textarea>
  </div>

  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>

      </div></div></div>

    
</body>
</html>

<?php
//////////// mochkla fe files ma tmchich !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
require "../config/connexion.php";
require "../config/commandes.php";

//echo "".$_FILES['file']['tmp_name'];
  if(isset($_POST['valider']))
  
  {
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']) )
    { 
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']) )
	    {
        $url = $_FILES['file'];
       
	    	$imagenom = htmlspecialchars(strip_tags($_POST['image']));
        
        $image="http://localhost/monoShop-main/image/" .$url['name'];
      
	    	$nom = htmlspecialchars(strip_tags($_POST['nom']));
	    	$prix = htmlspecialchars(strip_tags($_POST['prix']));
	    	$desc = htmlspecialchars(strip_tags($_POST['desc']));
        $qte = htmlspecialchars(strip_tags($_POST['qte']));
        
        uploadimage($url);
          $ajouter= ajouter($image, $nom, $prix, $desc,$qte);
           
          if($ajouter){
            header('location:afficher.php');
            
          }else{
            echo "produit n'est pas ajouter";
          }
        

	  
  
    //$user = htmlspecialchars($_POST['username']);
    //$url = $_FILES['myfile'];

    //echo "Hello $user <br/>";
   // echo "File Name<b>::</b> ".$url['name'];

   
}
}
}

?>