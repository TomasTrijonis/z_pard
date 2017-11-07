<?php//including the database connection file
include("core/database/connect.php");
 
//getting id of the data from url
$genre_id = $_GET['genre_id'];
 
//deleting the row from table
//$result_kat = mysqli_query($con, "DELETE FROM 'kategorijos' WHERE genre_id=".$genre_id."");

$result_kat = "DELETE FROM kategorijos WHERE genre_id=".$genre_id."";

if (mysqli_query($con, $result_kat)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);


//redirecting to the display page (index.php in our case)
header("Location:edit1_kat.php");
?>