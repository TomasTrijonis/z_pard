<?php
include("core/database/connect.php");

$order_id = $_GET['order_id'];

mysqli_query($con, "UPDATE mokejimai SET CONFIRM='1' WHERE order_id='$order_id'");

header("Location: uzsakymai.php");

?>