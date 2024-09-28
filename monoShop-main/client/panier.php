<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des commandes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
<style>
   

   img {
   transition: transform 0.6s ease-in-out; 
}
 img::after {
  animation: rotateImage 2s backwards; 
 }
img:hover {
    animation: rotateImage 2s forwards;
   
}

@keyframes rotateImage {
    0% {
        transform: scale(1) rotate(0deg);
    }
    50% {
        transform: scale(1.2) rotate(0deg);
    }
    100% {
      transform: scale(1.2) rotate(0deg);
    }
}

    </style>
    <h1>Historique des commandes</h1>

    <?php
    require "../config/connexion.php";
    session_start();

    // Vérifier si l'utilisateur est connecté
    if(isset($_SESSION['user'])) {
        $userid = $_SESSION['user']['id_c']; // Récupérer l'ID du client connecté
        // Ici, vous devrez exécuter une requête SQL pour récupérer les commandes du client avec l'ID $userId
        // Remplacez cet exemple par votre propre logique pour récupérer les commandes

        // Exemple de récupération de commandes fictives (remplacez cela par votre requête SQL réelle)
        $sql="select * from commandes where id_c=$userid ";
        $req=mysqli_query($con,$sql);
        
    }

        // Affichage des commandes
        //if (mysqli_num_rows($req)>=1) {
            ?>
            <main class="bd-main order-2" >

            <div class="album py-4 bg-light">
              <div class="container">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
                  
                <?php  while ($produit = mysqli_fetch_assoc($req)) : ?>
                    <?php
                        $id_p=$produit['id_p'];
                        $sql1= "select image from produits where id_p='$id_p'" ;
                        $req1=mysqli_query($con,$sql1);
                        $images=mysqli_fetch_assoc($req1);
                        ?>
                    <div class="col">
                      <div class="card shadow-sm">
                        <h5>id_commande  :<?= $produit['id_com'] ?></h5><h5> dans le date  :<small class="text" ><?= $produit['date_com'] ?> </small></h5>
                        <div class="d-flex justify-content-center">
                        <img src="<?= $images['image'] ?>" style="width: 40%">
                        </div>
                       
                        <div class="card-body">
                          
                          <div class="d-flex justify-content-between align-items-center">
                           
                            <small class="text" style="font-weight: bold;"><?= $produit['prix'] ?> dt</small>
                           <small>quantite:</small> 
                            <small class="text" style="font-weight: bold;"><?= $produit['qte']  ?> </small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endwhile; ?>
          
                </div>
              </div>
            </div>
            
          </main>
          
    <p><a href="logout.php">Déconnexion</a></p>
 
</body>
</html>
