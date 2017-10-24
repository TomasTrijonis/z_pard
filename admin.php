<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);
?>

<h1> Admin page </h1>
<br> 	
<?php
include 'core/database/showfiles.php';
?>


<?php

		if ($update = $con->query("Update zaidimai SET PAV = 'COUNTERSTRIKE' WHERE DEV = 'Blizzard' ")){
	
		echo $con->affected_rows;
	
		}

		?>

<html><body>

<h3><a href = "edit1.php"> Tvarkyti individualias prekes </a><h3>

<br>
<h3>Įterpkite naują prekę:</h3>
<br>
<form action="insert.php" method="POST"> 
Žaidimo pavadinimas: <input type="text" name="PAV" /> <br><br>
Kūrėjų studija: <input type="text" name="DEV" /> <br><br>
Žanras/Kategorija:
<select name="kategorijos"> 
<?php 
   while($row = mysqli_fetch_array($result2)) {
  //   $selected = (isset($_POST["GENRE"]) && $_POST["GENRE"] == $row['zanras']) ? 'selected="selected"' : 'no';
	echo "<option value= '".$row['zanras']. "'>".$row['zanras']."</option>";
   }
?>
</select> <br><br>
Kaina (€): <input type="number" name="PRICE" min="0" step="0.01"/> <br><br>
<input type="submit" /><br><br>
</form>

<br><br>

</body></html>
<?php
include 'includes/overall/footer.php';
?>