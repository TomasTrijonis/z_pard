<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

/*$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);*/
?>

<h1> Admin pDEV </h1>
<br> 	
<?php
include 'core/database/showfiles.php';
?>



	
<?php
// including the database connection file
include_once("core/database/connect.php");
 
if(isset($_POST['update']))
{    
    $gameid = $_POST['gameid'];
    
    $PAV=$_POST['PAV'];
    $DEV=$_POST['DEV'];
    $GENRE=$_POST['GENRE'];
	$IMAGE=$_POST['IMAGE']; 	
    
    // checking empty fields
    if(empty($PAV) || empty($DEV) || empty($GENRE)) {            
        if(empty($PAV)) {
            echo "<font color='red'>PAV field is empty.</font><br/>";
        }
        
        if(empty($DEV)) {
            echo "<font color='red'>DEV field is empty.</font><br/>";
        }
        
        if(empty($GENRE)) {
            echo "<font color='red'>GENRE field is empty.</font><br/>";
        }
		if(empty($IMAGE)) {
            echo "<font color='red'>IMAGE field is empty.</font><br/>";
        } 		
    } else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE zaidimai SET PAV='$PAV',DEV='$DEV',GENRE='$GENRE' ,IMAGE='$IMAGE' WHERE gameid='$gameid' ");
        
        //redirectig to the display pDEV. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php

/*$UploadedFileName=$_FILES['fileToUpload2']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
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
if ($_FILES["fileToUpload2"]["size"] > 500000) {
    echo "Jūsų failas per didelis.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Leidžiami tik JPG, JPEG, PNG & GIF failų formatai";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Jūsų failas nebuvo įkeltas.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {		

		
		$sql = "INSERT INTO zaidimai (PAV, DEV, GENRE, PRICE, IMAGE)
VALUES ('".$pav."', '".$dev."', '".$genre."', '".$price."', '".$target_file."')";

if ($con->query($sql) === TRUE) {
    header('Location: admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
		
		echo "Failas ". basename( $_FILES["fileToUpload2"]["name"]). " sėkmingai įkeltas.";
		
    } else {
		
        echo "Keliant failą įvyko klaida.";
    }
	
}*/




//getting gameid from url
include_once("core/database/connect.php");

$gameid = $_GET['gameid'];
 
//selecting data associated with this particular gameid
$result = mysqli_query($con, "SELECT * FROM zaidimai WHERE gameid='$gameid' ");


 
while($res = mysqli_fetch_assoc($result)){
	
    $PAV = $res['PAV'];
    $DEV = $res['DEV'];
    $GENRE = $res['GENRE'];
	$IMAGE = $res['IMAGE'];
	
}

/*if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}*/

?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editform.php" enctype="multipart/form-data">
        <table border="0">
            <tr> 
                <td>PAV</td>
                <td><input type="text" name="PAV"
				value="<?php echo $PAV;?>"></td>
            </tr>
            <tr> 
                <td>DEV</td>
                <td><input type="text" name="DEV" value="<?php echo $DEV;?>"></td>
            </tr>
            <tr> 
                <td>GENRE</td>
                <td><input type="text" name="GENRE" value="<?php echo $GENRE;?>"></td>
            </tr>
			<tr> 
                <td>NUOTRAUKA</td>
                <td><input type="text" name="IMAGE" value="<?php echo $IMAGE;?>"></td> <!--<input type="file" name="fileToUpload" id="fileToUpload"> <br><br>-->
            </tr>
            <tr>
                <td><input type="hidden" name="gameid" value=<?php echo $_GET['gameid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
	

<?php
include 'includes/overall/footer.php';
?>