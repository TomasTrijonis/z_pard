<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$query2 = "SELECT `zanras` FROM `kategorijos`";
$result2 = $con->query($query2);
?>

<h1> Admin page </h1>
<br> 	


<?php
include 'core/database/showfiles.php';
?>
<br><br>

<?php

		// if ($update = $con->query("Update zaidimai SET PAV = 'Overwatch' WHERE DEV = 'Blizzard' ")){
	
		// echo $con->affected_rows;
	
		// }

		?>

<h3><a href = "edit1.php"> Tvarkyti individualias prekes </a><h3>
<h3><a href = "edit1_kat.php"> Tvarkyti redaguoti kategorijas prekes </a><h3>

<?php
include 'includes/overall/footer.php';
?>