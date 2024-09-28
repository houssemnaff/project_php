<?php
 session_start();

//include "config/commandes.php";

// if(isset($_SESSION['userxXJppk45hPGu']))
// {
//     if(!empty($_SESSION['userxXJppk45hPGu']))
//     {
//         header("Location: client/");
//     }
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - MonoShop</title>
</head>
<body>
<br>
<br>
<br>
<br>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom et prenom</label>
                <input type="name" name="nom" class="form-control" style="width: 350%;" required >
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="name" name="prenom" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" required >
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">adresse</label>
                <input type="text" name="adresse" class="form-control" style="width: 350%;" required >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">tel</label>
                <input type="number" name="tel" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;" required>
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="Envoyer">
        </form>

        </div>
    </div>
</div>
    
</body>
</html>

<?php
 require "config/connexion.php";

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motpass = htmlspecialchars(strip_tags($_POST['motdepasse']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $motdepasse = password_hash($motpass, PASSWORD_DEFAULT);
        $adresse = htmlspecialchars(strip_tags($_POST['adresse'])) ;
        $tel = htmlspecialchars(strip_tags($_POST['tel'])) ;
       


        $sql = "INSERT INTO `clients` (`nom`,`prenom`, `email`, `motdepasse`,`adresse`,`tel`) VALUES (' $nom', '$prenom','$email', '$motdepasse','$adresse','$tel')";
        $req = mysqli_query($con, $sql);
       // $user = mysqli_fetch_array($req);
        if ($req) {
            // The query was successful
            $sql1="select id_c from clients where tel='$tel'";
            $req1=mysqli_query($con,$sql1);
            $usertrouver=mysqli_fetch_assoc($req1);
            $id_c=$usertrouver['id_c'];
            $userData = array(
                'id_c'=>$id_c,
                'email' => $email,
                'motdepasse' => $motdepasse,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'tel' => $tel
            );
            
            // Stockage dans la session
            $_SESSION['user'] = $userData;
            $_SESSION['success_message'] = "Compte créé avec succès!";
            if (mysqli_affected_rows($con) >= 1) {
              
                // At least one row was affected
                header('Location: shop.php');
            } else {
                // No rows were affected
                echo "Compte non créé !";
            }
        } else {
            // There was an error in the query
            echo "Compte non créé !";
        }
        

}
}
?>