<?php
include ('core/database/connect.php');

$pav = $_POST['PAV'];
$dev = $_POST['DEV'];
$genre_id = $_POST['genre_id'];
$price = $_POST['PRICE'];



$sql = "INSERT INTO zaidimai (PAV, DEV, genre_id, PRICE)
VALUES ('".$pav."', '".$dev."', '".$genre_id."', '".$price."')";

if ($con->query($sql) === TRUE) {
    header('Location: admin.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>