<?php
// configuration
include('core/database/connect.php');
 
// new data
$zanras = $_POST['zanras'];
$genre_id = $_POST['genre_id'];
// query
$sql = "UPDATE kategorijos
        SET zanras=?,
		WHERE genre_id=?";
$q = $con->prepare($sql);
$q->execute(array($zanras, $gameid));
header("location: edit11.php");
 
?>

