<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

/*$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);*/
?>

<h1> Admin </h1>
<br> 	

<?php
// including the database connection file
include_once("core/database/connect.php");
 
if(isset($_POST['update']))
{    
    $genre_id = $_POST['genre_id'];
    
    $zanras=$_POST['zanras'];
    	
    
    // checking empty fields
    if(empty($zanras)) {            
        if(empty($zanras)) {
            echo "<font color='red'>Zanro lauko tuscias.</font><br/>";
        }	
    } else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE kategorijos SET zanras='$zanras' WHERE genre_id='$genre_id' ");
        
        //redirectig to the display pDEV. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php

//getting gameid from url
include_once("core/database/connect.php");

$genre_id = $_GET['genre_id'];

//selecting data associated with this particular gameid
$result = mysqli_query($con, "SELECT * FROM kategorijos WHERE genre_id='$genre_id'");

while($res = mysqli_fetch_assoc($result)){

    $zanras = $res['zanras'];

}


?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    <form name="form1" method="post" action="editform_kat.php" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td>Žanras</td>
                <td><input type="text" name="zanras" value="<?php echo $zanras;?>"></td>
            </tr>
                <td><input type="hidden" name="genre_id" value=<?php echo $_GET['genre_id'];?>></td>
                <td><input type="submit" name="update" 	 value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
	

<?php
include 'includes/overall/footer.php';
?>