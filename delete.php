<?php//including the database connection file
include("core/database/config.php");
 
//getting id of the data from url
$gameid = $_GET['gameid'];
 
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM zaidimai WHERE gameid=$gameid");
 
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>