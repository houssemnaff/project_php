
<?php
//require"connexion.php";
function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$sql="SELECT * FROM produits WHERE id_p=?";

    $req = mysqli_query($con, $sql);

        $data = mysqli_fetch_assoc($req);

        return $data;

        
	}
}

function modifier($image, $nom, $prix, $desc, $id,$qte)
{
  if(require("connexion.php"))
  {
    $sql ="UPDATE produits SET image ='$image' ,
     nom ='$nom',
    prix ='$prix' ,
    description ='$desc' ,
    qte = '$qte' WHERE id_p=$id";
    $req=mysqli_query($con,$sql);


   
  }
  return $req;
}
function getAdmin($email, $password){
  
  if(require("connexion.php")){

    $sql="select * from clients where email=$email and motdepasse=$password";
   $req=mysqli_query($con,$sql);

    if(mysqli_affected_rows($con) >= 1){
      //while($user = mysqli_fetch_assoc($req)){
        //$mail = $user['email'];
        //$mdp = $user['motdepasse'];
      //}
      if($mail == $email AND $mdp == $password)
      {
        return $user;
      }
      else{
          return false;
      }

    }

  }

} 
function uploadimage($image){
 
  $uploadDirectory = "../image/"; // Directory to upload files

  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Allowed file extensions
//$image['name']='$nom';
  // Check file type and size
  $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

  if (in_array(strtolower($fileExtension), $allowedExtensions) && $image['size'] < 5000000) {
      $destination = $uploadDirectory . basename($image['name']);

      if (move_uploaded_file($image['tmp_name'], $destination)) {
          echo "File uploaded successfully.";
      } else {
          echo "Error uploading file. Please try again.";
      }
  } else {
      echo "Invalid file. Only JPG, JPEG, PNG, GIF files under 5MB are allowed.";
  }


}
function ajouter($image, $nom, $prix, $desc,$qte)
{
  if(require("connexion.php"))
  {
    $sql="INSERT INTO `produits` ( `image`, `nom`, `prix`, `description`,`qte`) VALUES ( '$image',' $nom',' $prix', '$desc','$qte')";
    $req = mysqli_query($con, $sql);
   
  }
  return $req;
}
function afficher()
{
	if(require("connexion.php"))
	{
		$sql="select * from produits";
        $req=mysqli_query($con,$sql);
        $produit = mysqli_fetch_assoc($req);

        return $produit;

        
	}
}

/*
function ajouterUser($nom, $prenom, $email, $motdepasse)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $prenom, $email, $motdepasse));

    return true;

    $req->closeCursor();
  }
}

// function getUsers($email, $password){
  
//   if(require("connexion.php")){

//     $req = $access->prepare("SELECT * FROM utilisateur ");

//     $req->execute();

//     if($req->rowCount() == 1){
      
//       $data = $req->fetchAll(PDO::FETCH_OBJ);

//       foreach($data as $i){
//         $mail = $i->email;
//         $mdp = $i->motdepasse;
//       }

//       if($mail == $email AND $mdp == $password)
//       {
//         return $data;
//       }
//       else{
//           return false;
//       }

//     }

//   }

// }

function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}

function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

  function ajouter($image, $nom, $prix, $desc)
  {
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

      $req->execute(array($image, $nom, $prix, $desc));

      $req->closeCursor();
    }
  }

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

function getAdmin($email, $password){
  
  if(require("connexion.php")){

    $req = $access->prepare("SELECT * FROM admin WHERE id=33");

    $req->execute();

    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}
*/
?>