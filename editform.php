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
    } else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE zaidimai SET PAV='$PAV',DEV='$DEV',GENRE='$GENRE' WHERE gameid=$gameid");
        
        //redirectig to the display pDEV. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting gameid from url
$gameid = $_GET['gameid'];
 
//selecting data associated with this particular gameid
$result = mysqli_query($con, "SELECT * FROM zaidimai WHERE gameid=$gameid");
 
while($res = mysqli_fetch_array($result))
{
    $PAV = $res['PAV'];
    $DEV = $res['DEV'];
    $GENRE = $res['GENRE'];
}

//if (!$check1_res) {
    //printf("Error: %s\n", mysqli_error($con));
    //exit();
//}

?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form PAV="form1" method="post" action="editform.php">
        <table border="0">
            <tr> 
                <td>PAV</td>
                <td><input type="text" PAV="PAV" value="<?php echo $PAV;?>"></td>
            </tr>
            <tr> 
                <td>DEV</td>
                <td><input type="text" PAV="DEV" value="<?php echo $DEV;?>"></td>
            </tr>
            <tr> 
                <td>GENRE</td>
                <td><input type="text" PAV="GENRE" value="<?php echo $GENRE;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" PAV="gameid" value=<?php echo $_GET['gameid'];?>></td>
                <td><input type="submit" PAV="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
	

<?php
include 'includes/overall/footer.php';
?>