<?php
include ('core/database/connect.php');

$pav = $_POST['PAV'];
$dev = $_POST['DEV'];
$genre = $_POST['GENRE'];
$price = $_POST['PRICE'];



$sql = "INSERT INTO zaidimai (PAV, DEV, GENRE, PRICE)
VALUES ('".$pav."', '".$dev."', '".$genre."', '".$price."')";

if ($con->query($sql) === TRUE) {
    header('Location: admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>