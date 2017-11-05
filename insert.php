<?php
include ('core/database/connect.php');

$pav = $_POST['PAV'];
$dev = $_POST['DEV'];
$genre_id = $_POST['genre_id'];
$price = $_POST['PRICE'];






//
//image insertion below
//

$UploadedFileName=$_FILES['fileToUpload']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Failas yra paveikslėlis - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Failas nėra paveikslėlis.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Failas jau egzistuoja.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Jūsų failas per didelis.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Leidžiami tik JPG, JPEG, PNG & GIF failų formatai";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Jūsų failas nebuvo įkeltas.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {		

		
		$sql = "INSERT INTO zaidimai (PAV, DEV, genre_id, PRICE, IMAGE)
VALUES ('".$pav."', '".$dev."', '".$genre_id."', '".$price."', '".$target_file."')";

if ($con->query($sql) === TRUE) {
    header('Location: admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
		
		echo "Failas ". basename( $_FILES["fileToUpload"]["name"]). " sėkmingai įkeltas.";
		
    } else {
		
        echo "Keliant failą įvyko klaida.";
    }
	
}
$con->close();
?>