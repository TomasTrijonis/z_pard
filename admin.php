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

<html><body>
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
	$selected = (isset($_POST["GENRE"]) && $_POST["GENRE"] == $row['zanras']) ? 'selected="selected"' : '';
	?><option value="<?php echo $row['zanras']; ?>" <?php echo $selected;?>><?php echo $row['zanras']; ?></option>
	
   <?php
   //echo "<option value= '".$row['zanras']."' >'".$row['zanras']."'</option>";
   //antras variantas
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