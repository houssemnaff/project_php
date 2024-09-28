<?php
require "../config/connexion.php";
?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Adresse</th>
        <th scope="col">Editer</th>
        <th scope="col">Supprimer</th>
        
    </tr>
</thead>
<tbody>
    <?php
    $sql4 = "SELECT * FROM clients";
    $req4 = mysqli_query($con, $sql4);

    while ($client = mysqli_fetch_assoc($req4)) :
    ?>
    <tr>
        <th scope="row"><?= $client['id_c'] ?></th>
        <td><?= $client['nom'] ?></td>
        <td><?= $client['prenom'] ?></td>
        <td><?= $client['tel'] ?></td>
        <td><?= $client['adresse'] ?></td>
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