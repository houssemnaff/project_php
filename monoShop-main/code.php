
<!DOCTYPE html>
<html>
<head>
	<title>ImageUpload</title>
</head>
<body style="zoom: 190%">
	<form method="post" enctype="multipart/form-data">
		<label>Username</label>
		<input type="text" name="username">
		<br>
		<label>UploadImage</label>
		<input type="file" name='myfile'>
		<br/>
		<input type="submit" name="upload" value="Envoyer">
	</form>
</body>
</html>

<?php

if(isset($_POST['upload'])){
    $user = htmlspecialchars($_POST['username']);
    $image = $_FILES['myfile'];

    echo "Hello $user <br/>";
    echo "File Name<b>::</b> ".$image['name'];

    $uploadDirectory = "image/"; // Directory to upload files

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Allowed file extensions

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


?>