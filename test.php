<?php
$con= mysqli_connect('localhost', 'root', '', 'z_pard');
$query = "SELECT * FROM `kategorijos`";
$result = mysqli_query($con, $query);

?>

<select> 


<?php 
   while($row = mysqli_fetch_array($result)):; ?>
        <option><?php echo $row[1];?></option>
<?php endwhile;?>
		 
</select>