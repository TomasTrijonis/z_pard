<?php

//including the database connection file
include("core/database/connect.php");
 
//getting id of the data from url

$order_id = $_GET['order_id'];
 
//deleting the row from table
mysqli_query($con, "DELETE FROM mokejimai WHERE order_id='$order_id'");
  

/*if (mysqli_query($con, $result_uz)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}*/
	
//redirecting to the display page (index.php in our case)
header("Location: uzsakymai.php");


//$order_id = $_GET['order_id'];
//mysql_query("DELETE from mokejimai WHERE order_id='$order_id'");


?>
