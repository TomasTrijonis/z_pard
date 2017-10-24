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
<form action="insert.php" method="POST" enctype="multipart/form-data"> 
Žaidimo pavadinimas: <input type="text" name="PAV" /> <br><br>
Kūrėjų studija: <input type="text" name="DEV" /> <br><br>

Žanras/Kategorija:
<select name="kategorijos"> 
<?php 
   while($row = mysqli_fetch_array($result2)) {
	$selected = (isset($_POST["GENRE"]) && $_POST["GENRE"] == $row['zanras']) ? 'selected="selected"' : '';
	?><option value="<?php echo $row['zanras']; ?>" <?php echo $selected;?>><?php echo $row['zanras']; ?></option>
	
   <?php
   //echo "<option value= '".$row['zanras']."' >'".$row['zanras']."'</option>";
   //antras variantas
   }
?>
</select> <br><br>

Kaina (€): <input type="number" name="PRICE" min="0" step="0.01"/> <br><br>
Nuotruka: <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
<input type="submit" name="submit" ><br><br>
</form>

<br><br>

</body></html>
<?php
include 'includes/overall/footer.php';
?>