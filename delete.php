<?php//including the database connection file
include("core/database/connect.php");
 
//getting id of the data from url
$gameid = $_GET['gameid'];
 
//deleting the row from table
$result_zaid = mysqli_query($con, "DELETE FROM 'zaidimai' WHERE gameid='$gameid'");
 die("error");
//redirecting to the display page (index.php in our case)
header("Location: edit1.php");

?>