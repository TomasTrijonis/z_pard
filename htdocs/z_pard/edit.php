<?php
// configuration
include('core/database/connect.php');
 
// new data
$PAV = $_POST['PAV'];
$DEV = $_POST['DEV'];
$GENRE = $_POST['GENRE'];
$PRICE = $_POST['PRICE'];
$gameid = $_POST['gameid'];
// query
$sql = "UPDATE zaidimai 
        SET PAV=?, DEV=?, GENRE=? PRICE=?
		WHERE gameid=?";
$q = $con->prepare($sql);
$q->execute(array($PAV,$DEV,$GENRE,$PRICE, $gameid));
header("location: edit1.php");
 
?>

