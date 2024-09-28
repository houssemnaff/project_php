
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
require "../config/connexion.php"; 
         

?>
<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/afficher.php">Produits</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
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
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">quantite</th>
                <th scope="col">Description</th>
                <th scope="col">Editer</th>
                <th scope="col">supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php

$sql1 = "select * from produits";
$req1 = mysqli_query($con, $sql1);

while ($produit = mysqli_fetch_assoc($req1)) :?>
    <tr>
        <th scope="row"><?= $produit['id_p'] ?></th>
        <td>
            <img src="<?= $produit['image'] ?>" style="width: 15%">
        </td>
        <td><?= $produit['nom'] ?></td>
        <td style="font-weight: bold; color: green;"><?= $produit['prix'] ?>dt</td>
        <td><?= $produit['qte'] ?></td>
        <td><?= substr($produit['description'], 0, 100); ?>...</td>
        <td><a href="editer.php?id=<?= $produit['id_p'] ?>"><i class="fa fa-pencil" style="font-size: 30px;color:green"></i></a></td>
        <td>
    <form method="post">

        <input type="hidden" name="product_id" value="<?= $produit['id_p'] ?>">
        <a type="submit" name="supp">
            <i class="fa fa-trash" style="font-size: 30px; color: green"></i>
        </a>
    </form>
</td>

    </tr>
<?php endwhile; ?>
</tbody>
<?php
// Assuming $con is your database connection

if (isset($_POST['supp'])) {
    if (isset($_POST['product_id'])) {
        $productID = $_POST['product_id'];

        // Sanitize the input to prevent SQL injection
        $sanitizedProductID = mysqli_real_escape_string($con, $productID);

        // Perform deletion query
        $sql = "DELETE FROM produits WHERE id_p = '$sanitizedProductID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Product deleted successfully.";
            
ob_start(); // Start output buffering
header("refresh: 5");
exit; // Ensure no further output is sent after header() calls


            // Additional actions after successful deletion
        } else {
            echo "Error deleting the product.";
        }
    } 
}
?>

    </table>
    </div>

</div>
</div>

    
</body>
</html>

