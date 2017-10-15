<?php
function sanitize($data) {
	include ('core/database/connect.php');
	return mysqli_real_escape_string($con,$data);
}
?>