<?php
// configuration
include('core/database/connect.php');
 
// new data
$PAV = $_POST['PAV'];
$DEV = $_POST['DEV'];
$genre_id = $_POST['genre_id'];
$PRICE = $_POST['PRICE'];
$gameid = $_POST['gameid'];
// query
$sql = "UPDATE zaidimai 
        SET PAV=?, DEV=?, genre_id=? PRICE=?
		WHERE gameid=?";
$q = $con->prepare($sql);
$q->execute(array($PAV,$DEV,$genre_id,$PRICE, $gameid));
header("location: edit1.php");
 
?>

